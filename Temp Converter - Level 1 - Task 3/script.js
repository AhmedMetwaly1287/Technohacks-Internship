const form = document.getElementById('converter');

form.addEventListener('submit', function (event) {
    event.preventDefault();

    const currDegree = parseFloat(document.getElementById('degree').value);
    const currUnit = document.getElementById('unit').value;
    const result = document.getElementById('result');

    if (currUnit === 'fahrenheit') {
        const finalResult = (currDegree - 32) * 5 / 9;
        result.value = finalResult.toFixed(2) + " C";
    } else if (currUnit === 'celsius') {
        const finalResult = (currDegree * 9 / 5) + 32;
        result.value = finalResult.toFixed(2) + " F";

    }
});

