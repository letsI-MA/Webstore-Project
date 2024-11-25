const footer = document.getElementById('footer');
footer.classList = 'bg-success text-light py-1 mt-auto ';
footer.innerHTML = ` <div class="container-fluid mb-0">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4 mt-1 text-center">
                <a href="impressum.html" class="text-light text-decoration-none">Impressum </a></br>
                <a href="Datenschutzerklärung.html" class="text-light text-decoration-none">Datenschutzerklärung</a>
                <p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore
                </p>
            </div>

            <!-- Links Section -->
            <div class="col-md-4 mt-1 text-center">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="index.html" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="categorie_select.php" class="text-light text-decoration-none">Catalog</a></li>
                    <li><a href="about.html" class="text-light text-decoration-none">About Us</a></li>

                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="col-md-4 mt-1 text-center">
                <h5>Follow Us</h5>
                <div class="mt-4">
                    <a href="#" class="text-light me-3 text-decoration-none">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-light me-3 text-decoration-none">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-light me-3 text-decoration-none">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-light me-3 text-decoration-none">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>

            </div>
        </div>

        <!-- Copyright Section -->
        <div class="text-center mt-1">
            <p class="mb-0">&copy; 2024 ByteBurgers. All rights reserved.</p>
        </div>
    </div>`;

//Active and DisableNavBar Icons
function setActiveNavLink() {
    const currentPath = window.location.pathname.split('/').pop(); // Get the current page name
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        const linkPath = link.getAttribute('href').split('/').pop(); // Get the link's page name
        if (linkPath === currentPath) {
            link.classList.add('active'); // Mark as active
            link.setAttribute('aria-current', 'page'); // Accessibility
        } else {
            link.classList.remove('active'); // Ensure others are not active
            link.removeAttribute('aria-current');
        }
    });
}
document.addEventListener('DOMContentLoaded', setActiveNavLink);

const header = document.getElementById('header');
header.classList = 'navbar navbar-expand-lg navbar-light';
header.innerHTML = ` <div class="container-fluid">
                <a class="navbar-brand fw-bold text-success" href="index.html">
                    <img src="assets/shopping-bag.png" alt="" class="mb-2" style="width: 30px">
                    Byteburger
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" id="homeLink" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="catalogLink" aria-current="page" href="categorie_select.php">Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="agbLink" aria-current="page" href="AGB.html">AGB's</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="anfahrtLink" aria-current="page" href="anfahrt.html">Anfahrt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="impressumLink" aria-current="page" href="impressum.html">Impressum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutLink" aria-current="page" href="about.html">About Us</a>
                        </li>
                    </ul>
                    <!-- Cart -->
                    <button class="btn btn-sm btn-warning mb-0 me-3 position-relative rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success"
                            id="numberOfItems">
                      
                      </span>
                        <i class="bi bi-basket fs-6 text-light"></i>
                    </button>
                    <!-- Cart modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        My Cart
                                        <i class="bi bi-cart4"></i>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
        
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-3">
                                                <p class="fs-6">Descrption</p>
        
                                            </div>
                                            <div class="col-3">
                                                <p class="fs-6">Quantity</p>
                                            </div>
                                            <div class="col-2">
                                                <p class="fs-6">Remove</p>
        
                                            </div>
                                            <div class="col-2">
                                                <p class="fs-6">price</p>
                                            </div>
                                            <div class="col-2">
                                                <p class="fs-6">Total</p>
                                            </div>
                                        </div>
                                        <ul class="list-group row border shadow-sm " id="list">
        
                                        </ul>
        
                                    </div>
        
                                    <ul class="list-group" id="shoppingItemList">
        
                                    </ul>
                                    <div class="d-flex container justify-content-end">
                                        <span id="totalAmmount">Total:</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn btn-primary" id="orderBtn">Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cookies"></div>
                    <!--Search bar-->
                    <form class="">
                        <div class="input-group my-2 mt-md-2 w-sm-50">
                            <input id="inputSearch" type="text" class="form-control rounded-end rounded-pill "
                                   placeholder="search"
                                   aria-label="search" aria-describedby="basic-addon2">
                            <button class="input-group-text btn btn-success rounded-start rounded-pill" id="basic-addon2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>`
