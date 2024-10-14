document.getElementById('converter-form').addEventListener('submit', function (e) {
    e.preventDefault();
    
    const temperature = document.getElementById('temperature').value;
    const unit = document.getElementById('unit').value;

    const formData = new FormData();
    formData.append('temperature', temperature);
    formData.append('unit', unit);

    fetch('convert.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        // Check if the response is ok and has content
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();  // Try reading the response as text first
    })
    .then(text => {
        try {
            const data = JSON.parse(text); // Attempt to parse JSON from the response
            if (data.result) {
                document.getElementById('result').textContent = data.result;
            } else if (data.error) {
                document.getElementById('result').textContent = 'Error: ' + data.error;
            }
        } catch (e) {
            // Handle case where response is not valid JSON
            document.getElementById('result').textContent = 'Error parsing JSON: ' + text;
        }
    })
    .catch(error => {
        document.getElementById('result').textContent = 'Error: ' + error.message;
    });
});
