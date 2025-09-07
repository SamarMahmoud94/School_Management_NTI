    </div>
    <script src="/school_managment_NTI/assets/js/bootstrap.bundle.min.js"></script>

    
    <footer class="custom-footer text-white text-center py-3 mt-2">
        <div class="container">
            <p class="mb-1">© 2025 School Management System. All rights reserved.</p>
            <p class="mb-1">Developed by Samar Mahmoud</p>
            <p class="mb-0">
                <a href="mailto:samarmahmoudp94@gmail.com" class="text-white me-3">📧 samarmahmoudp94@gmail.com</a>
                <a href="https://www.linkedin.com/in/samar-mahmoud-b783572a6/" target="_blank" class="text-white me-3">💼 LinkedIn</a>
                <a href="https://github.com/SamarMahmoud94" target="_blank" class="text-white">🐙 GitHub</a>
            </p>
        </div>
    </footer>

    <style>
        .custom-footer {
            background-color: #000;
            /* أسود */
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: auto;
        }

        /* نخلي الصفحة كلها Flexbox بحيث الفوتر يلزق تحت لو المحتوى قصير */
        html,
        body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        body>.container {
            flex: 1;
            /* يخلي الكونتينر ياخد المساحة ويدفع الفوتر لتحت */
        }
    </style>

    </body>

    </html>