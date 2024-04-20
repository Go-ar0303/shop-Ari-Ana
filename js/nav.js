function top() {
    let x = document.getElementById("myTop");
    if (x.className === "nav") {
      x.className += " responsive";
    } else {
      x.className = "nav";
    }
  }


  profle = document.querySelector('.flex .profile');
  document.querySelector('#user-btn').onclick = () => {
    profile.classList.toggle('active');
  }
  