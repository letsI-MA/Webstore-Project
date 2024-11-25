const cookies = document.querySelector('#cookies');
const date = new Date();
date.setHours(date.getHours() + 1);
const checkCookie = (username) => {
    const cookie = document.cookie;
    const userExists = cookie.split('; ').some(cookie => cookie === `username=${username}`);
    return userExists;
}
if (checkCookie('William')) {
    console.log('Cookie for username William exists!');
} else {
    window.addEventListener('load', event => {
        document.createElement('h1').innerText = 'Hello';
        cookies.innerHTML = `
      <div class="modal " tabindex="-1" id="modal">
          <div class="modal-dialog modal-xl fixed-bottom">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Cookies Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>
                    We use cookies to enhance your experience, analyze site traffic, and serve tailored content. 
                    By clicking "Accept All" or continuing to use our website, you consent to the use of cookies. 
                    You can manage your cookie preferences or learn more about the types of cookies we use by visiting our 
                    Privacy Policy or Cookie Settings.
                </p>
                <h5 class="my-3">What Are Cookies?</h5>
                <ul class="list-group my-3">
                    <li class="list-group-item">
                        <span class="fw-bold">Essential Cookies:</span> Necessary for the basic functioning of the site.
                    </li>
                     <li class="list-group-item">
                        <span class="fw-bold">Performance Cookies:</span> Help us measure and improve site performance.
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Functional Cookies:</span> Allow us to remember your preferences.
                    </li>
                    <li class="list-group-item">
                        <span class="fw-bold">Targeting/Advertising Cookies:</span> Used to deliver personalized ads.
                    </li>
                </ul>
                <h5 class="my-3">Manage Your Preferences</h5>
                <p class="my-3">
                    At any time, you can adjust your cookie settings in the Cookie Settings section or through your 
                    browser settings.
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-" id="closeBtn" data-bs-dismiss="modal">Accept only necessary</button>
                <button type="button" class="btn btn-primary" id="acceptBtn" data-bs-dismiss="modal">Accept all</button>
              </div>
            </div>
          </div>
      </div>
    `;
        var myModal = new bootstrap.Modal(document.getElementById('modal'));
        myModal.show();
        document.querySelector('#closeBtn').addEventListener('click', event => {
            cookies.style.display = 'none';
            document.cookie = `username=William; expires=${date}; path=/`;
        })
        document.querySelector('#acceptBtn').addEventListener('click', event => {
            cookies.style.display = 'none';
            document.cookie = `username=William; expires=${date}; path=/`;
        })
    })
}
