const  submitButton = document.getElementById("submit");
const  input = document.getElementById("grade");


input.addEventListener("keyup", (e) => {
    const value = e.currentTarget.value;
    submitButton.disabled = false;

        if (value === ""){
            submitButton.disabled = true;
        }
});

