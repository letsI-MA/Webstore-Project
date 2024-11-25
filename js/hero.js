const hero = document.getElementById('hero');
hero.classList = 'container my-4';
hero.innerHTML = `<div class="card bg-success bg-gradient rounded-5">
<div class="card-body">
    <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
            <div class="card bg-transparent border-0 rounded-pill align-self-start">
                <div class="card-body">
                    <p class="text-white bg-success rounded-pill px-3 opacity-25"><i
                            class="bi bi-truck"></i> Free
                        Shipping
                        Free
                    </p>
                </div>
            </div>
            <h1 class="display-4 text-white fw-bold">
                Make Healthy life with <span>fresh</span> grocery
            </h1>
            <p class="text-white">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, facilis
                Lorem ipsum dolor sit amet.
            </p>
            <a href="categorie_select.php" class="btn btn-warning text-white ">Shop now</a>
        </div>
        <div class="col-lg-6 d-flex justify-content-center mt-5">
            <img src="assets/cashier.png" alt="" class="cashier" style="width:80%">
        </div>
    </div>
</div>
</div>
</div>`