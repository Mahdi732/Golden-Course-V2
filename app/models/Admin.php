<?php
class Admin {

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getAllStatistique() {
        try {
            $statistics = [];
            $this->db->query("SELECT COUNT(*) AS total_courses FROM courses");
            $statistics['total_courses'] = $this->db->fetchColumn();
            $this->db->query("
                SELECT categories.name AS category_name, COUNT(courses.course_id) AS course_count
                FROM courses
                INNER JOIN categories ON courses.category_id = categories.category_id
                GROUP BY categories.name
            ");
            $statistics['courses_by_category'] = $this->db->resultSet(PDO::FETCH_ASSOC);
            $this->db->query("
                SELECT courses.title, COUNT(enrollments.student_id) AS student_count
                FROM enrollments
                INNER JOIN courses ON enrollments.course_id = courses.course_id
                GROUP BY courses.course_id
                ORDER BY student_count DESC
                LIMIT 1
            ");
            $statistics['course_with_most_students'] = $this->db->single(PDO::FETCH_ASSOC);
            $this->db->query("
                SELECT users.username AS teacher_name, COUNT(enrollments.student_id) AS student_count
                FROM enrollments
                INNER JOIN courses ON enrollments.course_id = courses.course_id
                INNER JOIN users ON courses.teacher_id = users.user_id
                GROUP BY users.user_id
                ORDER BY student_count DESC
                LIMIT 3
            ");
            $statistics['top_3_teachers'] = $this->db->resultSet(PDO::FETCH_ASSOC);
            return $statistics;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            throw new Exception("An error occurred while fetching global statistics.");
        }
    }
}