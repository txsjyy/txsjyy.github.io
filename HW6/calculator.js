
function calculate() {
    var p = document.getElementById('principal').value
    var r = document.getElementById('interest').value
    var n = document.getElementById('month').value
    if (isNaN(p) || isNaN(r)|| isNaN(n) || p < 0 || r < 0 || n < 0){
        alert("non-numeric values or negative numbers are entered. Please try again!")
    } 
    else{
        p = parseInt(p)
        r = parseFloat(r/12)
        n = parseInt(n)
        var payment = p * r / (1 - (1 / (1 + r)**n))
        document.getElementById('pay').innerHTML = Math.round(payment*100)/100
        document.getElementById('sum').innerHTML = Math.round(payment*n*100)/100
        document.getElementById('int').innerHTML = Math.round((payment*n-p)*100)/100
    }
}