<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
    <script src="https://unpkg.com/htmx.org@2.0.4"></script>
</head>
<body class="bg-gray-50">
<div class="flex">
    <!-- Sidebar -->
    <aside class="fixed h-screen w-64 bg-white shadow-lg">
        <div class="flex items-center justify-center h-16 border-b">
            <i class="fas fa-chalkboard-teacher text-blue-600 text-2xl mr-2"></i>
            <span class="text-xl font-bold">Teacher Portal</span>
        </div>
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="#dashboard" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50">
                        <i class="fas fa-home w-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <div class="coursework-toggle cursor-pointer p-3 text-gray-700 rounded-lg hover:bg-blue-50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fas fa-book-open w-5"></i>
                                <span class="font-medium">My Coursework</span>
                            </div>
                            <i class="fas fa-chevron-down text-sm"></i>
                        </div>
                    </div>
                    <div class="course-list ml-4 mt-2" style="display: none;">
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="course-toggle flex items-center justify-between p-2 text-gray-600 hover:text-blue-600 rounded">
                                    <div class="flex items-center">
                                        <i class="fas fa-folder course-icon w-4 mr-2"></i>
                                        <span>Mathematics 101</span>
                                    </div>
                                    <span class="text-xs text-gray-500">4 items</span>
                                </a>
                                <ul class="ml-6 mt-2 space-y-1" style="display: none;">
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-sm text-gray-500 hover:text-blue-600">
                                            <i class="fas fa-file-alt w-4 mr-2"></i>
                                            Week 1 Materials
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-sm text-gray-500 hover:text-blue-600">
                                            <i class="fas fa-file-alt w-4 mr-2"></i>
                                            Week 2 Materials
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="course-toggle flex items-center justify-between p-2 text-gray-600 hover:text-blue-600 rounded">
                                    <div class="flex items-center">
                                        <i class="fas fa-folder course-icon w-4 mr-2"></i>
                                        <span>Advanced Algebra</span>
                                    </div>
                                    <span class="text-xs text-gray-500">3 items</span>
                                </a>
                                <ul class="ml-6 mt-2 space-y-1" style="display: none;">
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-sm text-gray-500 hover:text-blue-600">
                                            <i class="fas fa-file-alt w-4 mr-2"></i>
                                            Course Outline
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-sm text-gray-500 hover:text-blue-600">
                                            <i class="fas fa-file-alt w-4 mr-2"></i>
                                            Assignments
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="course-toggle flex items-center justify-between p-2 text-gray-600 hover:text-blue-600 rounded">
                                    <div class="flex items-center">
                                        <i class="fas fa-folder course-icon w-4 mr-2"></i>
                                        <span>Calculus</span>
                                    </div>
                                    <span class="text-xs text-gray-500">2 items</span>
                                </a>
                                <ul class="ml-6 mt-2 space-y-1" style="display: none;">
                                    <li>
                                        <a href="#" class="flex items-center p-2 text-sm text-gray-500 hover:text-blue-600">
                                            <i class="fas fa-file-alt w-4 mr-2"></i>
                                            Introduction
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#content" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50">
                        <i class="fas fa-file-upload w-5"></i>
                        <span>Add Content</span>
                    </a>
                </li>
                <li>
                    <a href="#analytics" class="flex items-center p-3 text-gray-700 rounded-lg hover:bg-blue-50">
                        <i class="fas fa-chart-line w-5"></i>
                        <span>Analytics</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-8">
        <!-- Top Bar -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Welcome Back, Professor!</h1>
                <p class="text-gray-600">Here's what's happening with your courses</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search..."
                           class="pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
            </div>
        </div>

        <!-- Quick Action Buttons -->
        <div class="grid grid-cols-2 gap-6 mb-8">
            <button onclick="document.getElementById('documentEditor').style.display='block'; document.getElementById('uploadVideo').style.display='none';"
                    class="flex items-center justify-center p-6 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors">
                <i class="fas fa-edit text-3xl text-blue-600 mr-4"></i>
                <div class="text-left">
                    <h3 class="text-lg font-bold text-blue-900">Create Document</h3>
                    <p class="text-sm text-blue-700">Write and format your content</p>
                </div>
            </button>
            <button onclick="document.getElementById('uploadVideo').style.display='block'; document.getElementById('documentEditor').style.display='none';"
                    class="flex items-center justify-center p-6 bg-green-100 rounded-lg hover:bg-green-200 transition-colors">
                <i class="fas fa-video text-3xl text-green-600 mr-4"></i>
                <div class="text-left">
                    <h3 class="text-lg font-bold text-green-900">Add Video Course</h3>
                    <p class="text-sm text-green-700">Upload lecture videos or tutorials</p>
                </div>
            </button>
        </div>

        <!-- Document Editor -->
        <div id="documentEditor" class="bg-white rounded-lg shadow-sm p-6 mb-8" style="display: none;">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold">Create Document</h2>
                <button onclick="this.parentElement.parentElement.style.display='none'"
                        class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" class="space-y-6">
                <input type="hidden" name="course_type" value="document">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select name="category_id" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                            <option value="1">Mathematics</option>
                            <option value="2">Science</option>
                            <option value="3">History</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea name="document_content" id="document-editor" class="w-full h-64"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <input name="tags" class="tags-input w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Add tags (comma-separated)">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" class="px-6 py-3 border rounded-lg hover:bg-gray-50">
                        Save as Draft
                    </button>
                    <button type="submit" name="edit_course" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                        Publish Document
                    </button>
                </div>
            </form>
        </div>

        <!-- Upload Video -->
        <div id="uploadVideo" class="bg-white rounded-lg shadow-sm p-6 mb-8" style="display: none;">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold">Upload Video Course</h2>
                <button onclick="this.parentElement.parentElement.style.display='none'"
                        class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form method="POST" class="space-y-6">
                <input type="hidden" name="course_type" value="video">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category_id" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        <option value="1">Mathematics</option>
                        <option value="2">Science</option>
                        <option value="3">History</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Video Title</label>
                    <input type="text" name="title" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <input name="tags" class="tags-input w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Add tags (comma-separated)">
                </div>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                    <input type="file" name="video_file" class="hidden" id="video-upload" accept="video/*">
                    <label for="video-upload" class="cursor-pointer">
                        <i class="fas fa-video text-4xl text-gray-400 mb-4 block"></i>
                        <p class="text-gray-600">Drop your video here or click to browse</p>
                        <p class="text-sm text-gray-500 mt-2">Supported formats: MP4, MOV, AVI</p>
                    </label>
                </div>
                <button type="submit" name="edit_course" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                    Upload Video
                </button>
            </form>
        </div>

        <!-- Display Courses -->
        <?php $courseManagement->displayCoursesForTeacher($teacherId); ?>

        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h2 class="text-xl font-bold mb-6">Recent Activity</h2>
            <div class="space-y-4">
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <i class="fas fa-video text-blue-600 mr-4"></i>
                    <div>
                        <h4 class="font-medium">New Video Uploaded</h4>
                        <p class="text-sm text-gray-500">Introduction to Calculus - Chapter 1</p>
                    </div>
                    <span class="ml-auto text-sm text-gray-500">2 hours ago</span>
                </div>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <i class="fas fa-file-pdf text-red-600 mr-4"></i>
                    <div>
                        <h4 class="font-medium">Document Added</h4>
                        <p class="text-sm text-gray-500">Week 3 Assignment PDF</p>
                    </div>
                    <span class="ml-auto text-sm text-gray-500">1 day ago</span>
                </div>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <i class="fas fa-comments text-green-600 mr-4"></i>
                    <div>
                        <h4 class="font-medium">New Discussion</h4>
                        <p class="text-sm text-gray-500">Algebra Problem Solving Session</p>
                    </div>
                    <span class="ml-auto text-sm text-gray-500">2 days ago</span>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    tinymce.init({
        selector: '#document-editor',
        plugins: 'lists link image table code',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code'
    });

    const tagsInputs = document.querySelectorAll('.tags-input');
    tagsInputs.forEach(input => {
        new Tagify(input);
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.coursework-toggle').addEventListener('click', function() {
            const courseList = document.querySelector('.course-list');
            courseList.style.display = courseList.style.display === 'none' ? 'block' : 'none';
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        });

        document.querySelectorAll('.course-toggle').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const materials = this.nextElementSibling;
                materials.style.display = materials.style.display === 'none' ? 'block' : 'none';
                const icon = this.querySelector('.course-icon');
                icon.classList.toggle('fa-folder');
                icon.classList.toggle('fa-folder-open');
            });
        });
    });
</script>
</body>
</html>