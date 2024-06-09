document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('consent').addEventListener('change', function () {
        document.getElementById('submitButton').disabled = !this.checked;
    });

    document.getElementById('submitButton').addEventListener('click', function () {
        // Validation
        if (!document.getElementById('consent').checked) {
            alert('Tolong Setujui untuk mengizinkan Samasta menyimpan dan memproses data pribadi anda!');
            return; // Stop further execution if validation fails
        }
    });
});