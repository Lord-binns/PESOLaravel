<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-inner">
            <div>© {{ date('Y') }} PESO. All rights reserved.</div>
            
            <nav class="footer-nav">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </nav>
        </div>
    </div>
</footer>

<style>
.site-footer {
    background: linear-gradient(to right, 
        #FF0000 0%, 
        #FF0000 10%, 
        #000000 20%, 
        #030112 30%, 
        #03010f 40%, 
        #09012a 50%, 
        #010135 60%, 
        #02256a 100%
    ) !important;
    border-top: 3px solid #ffd700;
    color: #ffffff;
    padding: 1rem 0;
    width: 100%;
    margin-top: auto;
    margin-left: 0;
    box-sizing: border-box;
    position: relative;
    clear: both;
    float: none;
    left: 0;
    right: 0;
}

.site-footer.no-sidebar {
    margin-left: 0;
}

.footer-container {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1rem;
}

.footer-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.site-footer a {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.site-footer a:hover {
    color: #ffd700;
}

.footer-nav a {
    margin-left: 15px;
}

@media (max-width: 768px) {
    .site-footer {
        margin-left: 0;
    }
    
    .footer-container {
        width: 100%;
    }
    
    .footer-inner {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-nav a {
        margin: 0 10px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('dashboardSidebar');
    const footer = document.querySelector('.site-footer');
    
    if (sidebar && footer) {
        if (sidebar.classList.contains('collapsed')) {
            footer.classList.add('no-sidebar');
        }
        
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {
                    if (sidebar.classList.contains('collapsed')) {
                        footer.classList.add('no-sidebar');
                    } else {
                        footer.classList.remove('no-sidebar');
                    }
                }
            });
        });
        
        observer.observe(sidebar, { attributes: true });
    }
});
</script>
