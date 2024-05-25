let openCart = document.querySelector('.openCart');
let CloseCart = document.querySelector('.closeCart');
let listCourse = document.querySelector('.listCourse');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openCart.addEventListener('click', () => {
    body.classList.add('active');
})
CloseCart.addEventListener('click', () => {
    body.classList.remove('active');
})

// data

let AllCourses = [];
let Course = [
    {
        id: 2,
        name: 'JavaScript Beginners Course',
        image: 'c1.JPG',
        price: 300
    },
    {
        id: 3,
        name: 'HTML & CSS Begginer  Beginners Course',
        image: 'c2.JPG',
        price: 350
    },
    {
        id: 5,
        name: ' Python Beginners Course',
        image: 'c3.JPG',
        price: 400
    },
    {
        id: 6,
        name: 'Java Programming for Beginners',
        image: 'java.JFIF',
        price: 400
    },
    {
        id: 7,
        name: 'CSS - The Complete Guide 2023',
        image: 'css.JFIF',
        price: 250
    },
    {
        id: 9,
        name: 'Node.js Developer Course',
        image: 'Node.JFIF',
        price: 600
    },
    {
        id: 8,
        name: 'PHP for Beginners',
        image: 'php.JFIF',
        price:250
    },
    {
        id: 10,
        name: 'JavaScript Beginners Course',
        image: 'c1.JFIF',
        price: 300
    },
    {
        id: 2,
        name: 'PHP for Beginners',
        image: 'CPP.JFIF',
        price: 450
    },
    {
        id: 12,
        name: 'MongoDB',
        image: 'mongo.JFIF',
        price: 99
    }
];


function addToCard(key) {
    if (AllCourses[key] == null) {
        // copy product form list to list card
        AllCourses[key] = JSON.parse(JSON.stringify(Course[key]));
        // AllCourses[key] = Course[key];
        AllCourses[key].quantity = 1;
    }
    reloadCard();
}

function reloadCard() {
    listCourse.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    AllCourses.forEach((value, key) => {
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if (value != null) {
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div ><img src="images/${value.image}"/></div>
                <div class="txt">${value.name}</div>
                <div class="txt">${value.price.toLocaleString()}</div>
                <div>
                <i class="fa-solid fa-circle-minus" onclick="changeQuantity(${key}, ${value.quantity - 1}"></i>
                <div class="count">${value.quantity}</div>
                    
                </div>`;

            listCourse.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity) {
    if (quantity == 0) {
        delete AllCourses[key];
    } else {
        AllCourses[key].quantity = quantity;
        AllCourses[key].price = quantity * Course[key].price;
    }
    reloadCard();
}