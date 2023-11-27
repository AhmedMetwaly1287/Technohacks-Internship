document.addEventListener("DOMContentLoaded", function () {
    const display = document.getElementById("display");
    let currentValue = "";
    let currentOperator = "";
    let lastValue = "";

    function updateDisplay() {
        display.value = currentValue === "" ? "0" : currentValue;
    }


    const buttons = document.querySelectorAll(".number, .operation, .clear, .equal");
    buttons.forEach((button) => {
        button.addEventListener("click", function () {
            const buttonValue = button.value;

            if (buttonValue >= '0' && buttonValue <= '9') {
                currentValue += buttonValue;
            } else if (buttonValue === "." && currentValue.indexOf(".") === -1) {
                currentValue += buttonValue;
            } else if (buttonValue === "C") {
                currentValue = "";
                currentOperator = "";
                lastValue = "";
            } else if (buttonValue === "=") {
                if (currentOperator && lastValue !== "") {
                    currentValue = operate(lastValue, currentOperator, currentValue).toString();
                    currentOperator = "";
                    lastValue = "";
                }
            } else {
                if (currentOperator && lastValue !== "") {
                    currentValue = operate(lastValue, currentOperator, currentValue).toString();
                    lastValue = currentValue;
                } else {
                    lastValue = currentValue;
                }
                currentOperator = buttonValue;
                currentValue = "";
            }

            updateDisplay();
        });
    });
    function operate(a, operator, b) {
        a = parseFloat(a);
        b = parseFloat(b);
        switch (operator) {
            case "+":
                return a + b;
            case "-":
                return a - b;
            case "*":
                return a * b;
            case "/":
                if (b === 0) {
                    return "Error";
                }
                return a / b;
            default:
                return "Error";
        }
    }
});
