document.getElementById('search-bar').addEventListener('input', function () {
    const query = this.value;

    if (query.length > 0) {
        fetch('searchHandler.php?query=' + encodeURIComponent(query))
            .then(response => response.text())
            .then(data => {
                document.getElementById('search-results').innerHTML = data;
                document.getElementById('search-results').style.display = 'block';
            });
    } else {
        document.getElementById('search-results').innerHTML = '';
        document.getElementById('search-results').style.display = 'none';
    }
});