const form = document.getElementById("add-product")
const message = document.getElementById("message")
const message_text = document.getElementById("message-text")

form.addEventListener("submit", (e) => {
    e.preventDefault()

    let formData = new FormData(form)

    xhttp = new XMLHttpRequest()
    xhttp.onload = function () {
        message.style.display = "block"
        if (xhttp.status === 200) {
            message_text.innerText = "Product Added."
        } else {
            message.innerText = "An Error Occurred."
        }
    }

    xhttp.open("POST", "add_product.php", true)
    xhttp.send(formData)

    document.getElementById("prod_name_input").value = ""
    document.getElementById("prod_price_input").value = ""
})