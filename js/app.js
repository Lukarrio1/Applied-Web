document.getElementById('navbar').addEventListener('mouseover', Nav);
document.getElementById('footer').addEventListener('mouseover', Footer);

function Nav() {
    var home = document.getElementById('home');
    var cars = document.getElementById('cars');
    var logout = document.getElementById('Logout');
    var admin = document.getElementById('admin');
    var fav = document.getElementById('fav');
    home.className = "nav-item nav-link active h5  text-success";
    cars.className = "nav-item nav-link h5  text-warning";
    logout.className = "nav-item nav-link h5  text-warning";
    admin.className = "nav-item nav-link h5  text-success";
    fav.className = "nav-item nav-link h5  text-warning"
}

function Footer() {
    var year = document.getElementById('year');
    var copyright = document.getElementById('copyright');
    year.className = "text-warning";
    copyright.className = "text-success";
}
// document.getElementById('form').addEventListener('click', Validate);

// function Validate(e) {
//     e.preventDefault();
//     var name = document.getElementById('User_name').value;
//     var password = document.getElementById('User_password').value;
//     var login = document.getElementById('login').value;
//     var params = "User_name=" + name + "&User_password=" + password + "&login=" + login;
//     xhr = new XMLHttpRequest();
//     xhr.open('POST', 'admin.php', true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
//     xhr.onload = function() {
//         if (this.status == 200) {
//             console.log(name);
//             console.log(12);
//         }
//     }
//     xhr.send(params);

// }