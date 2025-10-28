document.getElementById("menuToggle").addEventListener("click", function() {
    document.querySelector("nav").classList.toggle("active");
});

 document.querySelector("form").addEventListener("submit", function (e) {
    const nama=document.getElementById("txtnama").value;
    const email=document.getElementById("txtemail").value;
    const pesan=document.getElementById("txtpesan").value;
    
    if(nama === "" || email === "" || pesan === ""){
        alert("Semua kolom wajib di isi");
        e.preventDefault();
    }else{
        alert("terima kasih, " + nama + ", pesan anda sudah di kirim");
    }
});

document.getElementById("menuToggle").addEventListener("click", function() {
    const nav = document.querySelector("nav");
    nav.classList.toggle("active");

    if (nav.classList.contains("active"))  {
        this.textContent = "\u2716";
    } else {
        this.textContent = "\u2630";
    }

});

document.querySelector("form").addEventListener("submit", function (e) {
    const nama=document.getElementById("txtnama");
    const email=document.getElementById("txtemail");
    const pesan=document.getElementById("txtpesan");

    document.querySelectorAll(".error-msg").forEach(el => el.remove());
    [nama, email, pesan].forEach(el => el.style.border = "")

let isValid = true

if (nama.value.trim().length < 3) {
    showerror(nama, "Nama minimal 3 huruf dan tidak boleh kosong");
} else if (!/^[a-zA-Z\s]+$/.test(nama.value.trim())) {
    showerror(nama, "Nama hanya boleh berisi huruf dan spasi");
isValid = false;
}

if (email.value.trim() === "") {
    showerror(email, "Email wajib diisi");
    isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {

        showerror(email, "Format email tidak valid.contoh: nama@gmail.com");
        isValid = false;
    }
     
if (pesan.value.trim().length < 10) {
    showerror(pesan, "Pesan minimal 10 karakter agar lebih jelas");
    isValid = false;
}

if (!isValid) {
    e.preventDefault();
} else {
    alert("Terima kasih, " + nama.value + ", pesan anda tlah dikirim.");
}
});

function showerror(inputElement, message) {
    const label = inputElement.closest("label");
    if (!label) return;

    label.style.flexWrap = "wrap";

    const small = document.createElement("small");
    small.className = "error-msg";
    small.textContent = message;

    small.style.color = "red";
    small.style.forntsize = "12px";
    small.style.marginTop = "5px";
    small.style.display = "block";
    small.style.flexBasis = "100%";
    small.dataset.forId = inputElement.id;

if (inputElement.nextSibling) {
    label.insertBefore(small, inputElement.nextSibling);
} else {
    label.appendChild(small);
}

inputElement.style.border = "1px solid red";

alignErrorMessages(small, inputElement);
}

function alignErrorMessages(smallel, inputEl) {
    const isMobile = window.matchMedia("(max-width: 600px)").matches;
   if (isMobile) {
    smallel.style.marginLeft = "0";
    smallel.style.width = "100%";
    return;
    }

    const label = inputEl.closest("label");
    if (!label) return;

    const rectLabel = label.getBoundingClientRect();
    const rectinput = inputEl.getBoundingClientRect();
    const offsetLeft = Math.max(0, Math.round(rectinput.left - rectLabel.left)
);
    smallel.style.marginLeft = offsetleft + "px";
    smallel.style.width = Math.round(rectinput.width) + "px";
}

window.addEventListener("resize", () => {
    document.querySelectorAll(".error-msg").forEach(small => {
        const target = document.getElementById(small.dataset.forId);
        if (target) alignErrorMessages(small, target);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const homeseletion = document.getElementById("home");
    const ucapan = document.createElement("p");
    ucapan.textContent = "hallo selamat datang di halaman saya!";
    homeseletion.appendChild(ucapan);
});
