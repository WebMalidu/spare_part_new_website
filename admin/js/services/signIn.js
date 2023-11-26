SERVER_URL = "";
const ALG = new DashboardComponents();

//fetch request sending model
const requestSender = new Sender();

async function signIn() {
       const mobile = document.getElementById("mobile").value;
       const password = document.getElementById("password").value;

       const form = new FormData();
       form.append("mobile", mobile);
       form.append("password", password);

       if (mobile == "") {
              ALG.openToast(
                     "Warning",
                     "Please add a mobile number ",
                     ALG.getCurrentTime(),
                     "bi-heart",
                     "Error"
              );
              return;
       } else if (password == "") {
              ALG.openToast(
                     "Warning",
                     "Please add a password",
                     ALG.getCurrentTime(),
                     "bi-heart",
                     "Error"
              );
              return;
       }

       const response = await requestSender.dataIUD(form, "admin/api/adminSignInProcess.php");
       if (response.status === 'success') {
              ALG.openToast("Success", "Let's Go", ALG.getCurrentTime(), "bi-heart", "Success");
              setTimeout(() => {
                     window.location.href = SERVER_URL + "admin/dashboard.php"
                     // window.location.reload();
              }, 1500);
       } else {
              ALG.openToast("Warning", response.error, ALG.getCurrentTime(), "bi-heart", "Error");
       }


}
