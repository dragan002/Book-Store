document.getElementById('categorySearchInput').addEventListener('input', function() {
    var searchValue = this.value.toLowerCase();
    var categoryItems = document.querySelectorAll('.category-list .dropdown-item');
    categoryItems.forEach(function(item) {
        var categoryName = item.textContent.trim().toLowerCase();
        if (categoryName.includes(searchValue)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});