function showSuggestion(str) {
    if (str.length == 0) {
        document.getElementById("suggestion-list").innerHTML = ""
        return
    } else {
        let xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("suggestion-list").innerHTML = this.responseText
            }
        }
        xhttp.open("GET", "get_suggestion.php?q=" + str, true)
        xhttp.send()
    }
}

function show() {
    let x = document.getElementById('nav-bar')
    if (x.className === 'nav-bar') {
        x.className += ' responsive'
    } else {
        x.className = 'nav-bar'
    }
}