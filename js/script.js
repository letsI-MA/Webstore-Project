// Items Array
document.addEventListener("DOMContentLoaded", () => {
let items = [
    { id: 1, name: 'Apple', price: 9.99, quantity: 1 },
    { id: 2, name: 'Orange', price: 19.99, quantity: 2 },
    { id: 3, name: 'Banana', price: 29.99, quantity: 3 }
];

// DOM Elements
const itemsSpan = document.getElementById('numberOfItems');
const itemList = document.getElementById('list');
const totalAmmount = document.getElementById('totalAmmount');

// Utility Functions
const calculateTotalAmount = () => {
    const total = items.reduce((acc, item) => acc + item.price * item.quantity, 0);
    totalAmmount.innerText = `$${total.toFixed(2)}`;
};

const renderSpan = () => {
    itemsSpan.innerText = items.length;
};

const saveToLocalStorage = () => {
    localStorage.setItem('shoppingCart', JSON.stringify(items));
};

const getDataFromLocalStorage = () => {
    const data = localStorage.getItem('shoppingCart');
    if (data) items = JSON.parse(data);
};

const removeItem = (id) => {
    items = items.filter(item => item.id !== id);
    updateUI();
};

const updateQuantity = (id, change) => {
    const item = items.find(i => i.id === id);
    if (!item) return;

    item.quantity += change;

    if (item.quantity <= 0) {
        removeItem(id);
    } else {
        updateUI();
    }
};

const updateUI = () => {
    renderSpan();
    calculateTotalAmount();
    saveToLocalStorage();
    renderList();
};

// Render Functions
const renderList = () => {
    // Clear the list
    itemList.innerHTML = '';

    // Generate and append items
    items.forEach(({ id, name, price, quantity }) => {
        const li = document.createElement('li');
        li.className = 'list-group-item';

        li.innerHTML = `
            <div class="row">
                    <div class="col "><span>${name}</span></div>
                    <div class="col d-flex justify-content-end align-items-center">
                        <button class="btn btn-sm btn-danger me-2 decrease-btn">-</button>
                        <span class="px-2">${quantity}</span>
                        <button class="btn btn-sm btn-success ms-2 increase-btn">+</button>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center"><button class="btn btn-sm btn-danger remove-btn ">X</button></div>
                    <div class="col d-flex justify-content-end align-items-center"><span class="total ms-2">$${price}</span></div>
                    <div class="col d-flex justify-content-end align-items-center"><span class="total ms-2">$${(price * quantity).toFixed(2)}</span></div>
                </div>
        `;

        // Attach event listeners
        li.querySelector('.remove-btn').addEventListener('click', () => removeItem(id));
        li.querySelector('.decrease-btn').addEventListener('click', () => updateQuantity(id, -1));
        li.querySelector('.increase-btn').addEventListener('click', () => updateQuantity(id, 1));

        itemList.appendChild(li);
    });
};

// Initialization
getDataFromLocalStorage();
updateUI();


const addToCard = document.getElementById('addToCard');

addToCard.addEventListener('click',()=>{
   
    const itemPrice = document.getElementById('itemPrice').innerText;
    const itemName = document.getElementById('itemName').innerText;
    const priceWithoutEuro = itemPrice.replace('€', '')
    const url = new URL(window.location.href);
    const itemId = +url.searchParams.get('itemID');
    // Get the 'itemID' parameter
    const itemObj = {id: itemId, name: itemName, price: priceWithoutEuro, quantity:1};
    
    const existingItem = items.find(item => item.id === itemId);

    if (existingItem) {
        // If the item exists, update its quantity by calling updateQuantity function with +1
        updateQuantity(itemId, 1);
    } else {
        // If the item doesn't exist in the array, add it as a new item
        const newItem = { id: itemId, name: itemName, price: priceWithoutEuro, quantity: 1 };
        items.push(newItem);  // Add the new item to the array
        updateUI(); // Update the UI after adding the item
    }
    
   
   
    
})
const orderBtn = document.getElementById('orderBtn');
orderBtn.addEventListener('click',  ()=>{
    fetch('warenkorb.php',{
        method:"POST",
        body: JSON.stringify(items)
    }).then(resposne=> resposne.json()).then(data=>console.log(data.message));
})

});