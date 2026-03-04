<footer class="site-footer">
    <div class="container footer-inner" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
        <div>© {{ date('Y') }} PESO. All rights reserved.</div>
        
        <nav class="footer-nav" style="margin-right: 40px;">
            <a href="#" style="margin-right: 15px;">Privacy</a>
            <a href="#">Terms</a>
        </nav>
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
    padding: 1.5rem 0;
}

.site-footer a {
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.site-footer a:hover {
    color: #ffd700;
}

.footer-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.footer-nav a {
    margin-left: 15px;
}

@media (max-width: 576px) {
    .footer-inner {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-nav {
        margin-right: 0 !important;
    }
    
    .footer-nav a {
        margin: 0 10px;
    }
}
</style>
