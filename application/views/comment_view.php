<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .comment-section {
            max-width: 800px;
            margin: 2rem auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .comment-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.2s;
            border: 1px solid #e9ecef;
        }

        .comment-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-input {
            border-radius: 20px;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            transition: all 0.3s;
        }

        .comment-input:focus {
            box-shadow: none;
            border-color: #86b7fe;
        }

        .btn-comment {
            border-radius: 20px;
            padding: 8px 25px;
            background: #0d6efd;
            border: none;
            transition: all 0.3s;
        }

        .btn-comment:hover {
            background: #0b5ed7;
            transform: translateY(-1px);
        }

        .comment-actions {
            font-size: 0.9rem;
        }

        .comment-actions a {
            color: #6c757d;
            text-decoration: none;
            margin-right: 15px;
            transition: color 0.2s;
        }

        .comment-actions a:hover {
            color: #0d6efd;
        }

        .comment-time {
            color: #adb5bd;
            font-size: 0.85rem;
        }

        .reply-section {
            margin-left: 60px;
            border-left: 2px solid #e9ecef;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="comment-section">
            <!-- New Comment Form -->
            <div class="mb-4">
                <div class="d-flex gap-3">
                    <img src="https://randomuser.me/api/portraits/women/4.jpg" alt="User Avatar" class="user-avatar">
                    <div class="flex-grow-1">
                        <textarea class="form-control comment-input" rows="3" placeholder="Write a comment..."></textarea>
                        <div class="mt-3 text-end">
                            <button class="btn btn-comment text-white">Post Comment</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments List -->
            <div class="comments-list">
                <!-- Comment 1 -->
                <div class="comment-box">
                    <div class="d-flex gap-3">
                        <img src="https://randomuser.me/api/portraits/men/34.jpg" alt="User Avatar" class="user-avatar">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">John Doe</h6>
                                <span class="comment-time">2 hours ago</span>
                            </div>
                            <p class="mb-2">This is an amazing post! Thanks for sharing your insights with us. I've
                                learned a lot from this.</p>
                            <div class="comment-actions">
                                <a href="#"><i class="bi bi-heart"></i> Like</a>
                                <a href="#"><i class="bi bi-reply"></i> Reply</a>
                                <a href="#"><i class="bi bi-share"></i> Share</a>
                            </div>
                        </div>
                    </div>

                    <!-- Reply Section -->
                    <div class="reply-section mt-3">
                        <div class="comment-box">
                            <div class="d-flex gap-3">
                                <img src="https://randomuser.me/api/portraits/women/64.jpg" alt="User Avatar" class="user-avatar">
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0">Jane Smith</h6>
                                        <span class="comment-time">1 hour ago</span>
                                    </div>
                                    <p class="mb-2">Totally agree with you! The points mentioned are very insightful.
                                    </p>
                                    <div class="comment-actions">
                                        <a href="#"><i class="bi bi-heart"></i> Like</a>
                                        <a href="#"><i class="bi bi-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comment 2 -->
                <div class="comment-box">
                    <div class="d-flex gap-3">
                        <img src="https://randomuser.me/api/portraits/men/9.jpg" alt="User Avatar" class="user-avatar">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">Mike Johnson</h6>
                                <span class="comment-time">3 hours ago</span>
                            </div>
                            <p class="mb-2">Great discussion everyone! I'd like to add that this topic has many
                                interesting aspects we could explore further.</p>
                            <div class="comment-actions">
                                <a href="#"><i class="bi bi-heart"></i> Like</a>
                                <a href="#"><i class="bi bi-reply"></i> Reply</a>
                                <a href="#"><i class="bi bi-share"></i> Share</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>