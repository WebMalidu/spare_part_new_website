class Toast {

    constructor(bg, message) {
        this.bg = bg;
        this.message = message;
    }

    static toastLoad(type, message) {
        let header;

        if (type == "success") {
            header = "success";
            this.bg = "bg-success";
        } else if (type == "warning") {
            header = "warning";
            this.bg = "bg-warning"
        } else if (type == "error") {
            header = "error";
            this.bg = "bg-danger"
        }

        const toastContainer = document.getElementById("toastContainer");

        toastContainer.innerHTML = `<div class="d-flex justify-content-end">
       <div class="col-2 toast-mess alg-shadow">
           <div class="${this.bg} p-1 px-2 rounded-top alg-text-p "><span>${header}</span></div>
           <div class="bg-ino p-2 px-4 rounded-bottom alg-text-p">${message}</div>
       </div>
    </div>`

        setInterval(() => {
            toastContainer.innerHTML = '';
        }, 5000)
    }
}