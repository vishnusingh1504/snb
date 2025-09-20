document.addEventListener('DOMContentLoaded', function() {

    // --- DEBOUNCE FUNCTION ---
    // This prevents the API from being called on every keystroke, improving performance.
    function debounce(func, delay) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    // --- SECTION 1: MANUAL HINDI REFINEMENT WITH SUGGESTION BOX ---

    // Function to fetch suggestions for manual refinement
    function fetchSuggestions(text, suggestionsContainer, currentInput) {
        if (text.trim() === '') {
            suggestionsContainer.innerHTML = '';
            suggestionsContainer.classList.add('d-none');
            return;
        }
        const url = `https://inputtools.google.com/request?text=${encodeURIComponent(text)}&itc=hi-t-i0-und&num=5&cp=0&cs=1&ie=utf-8&oe=utf-8`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data && data[0] === 'SUCCESS' && data[1] && data[1][0] && data[1][0][1]) {
                    displaySuggestions(data[1][0][1], suggestionsContainer, currentInput);
                } else {
                    suggestionsContainer.classList.add('d-none');
                }
            })
            .catch(error => {
                console.error('Error fetching suggestions:', error);
                suggestionsContainer.classList.add('d-none');
            });
    }

    // Function to display the suggestion box
    function displaySuggestions(suggestions, suggestionsContainer, currentInput) {
        suggestionsContainer.innerHTML = '';
        if (suggestions.length > 0) {
            suggestions.forEach(suggestion => {
                const suggestionDiv = document.createElement('a');
                suggestionDiv.textContent = suggestion;
                suggestionDiv.className = 'list-group-item list-group-item-action';
                suggestionDiv.addEventListener('click', function() {
                    currentInput.value = suggestion;
                    suggestionsContainer.innerHTML = '';
                    suggestionsContainer.classList.add('d-none');
                });
                suggestionsContainer.appendChild(suggestionDiv);
            });
            suggestionsContainer.classList.remove('d-none');
        }
    }

    // --- SECTION 2: AUTOMATIC ENGLISH-TO-HINDI TRANSLITERATION ---

    // Function to auto-transliterate and populate the Hindi field
    function autoTransliterate(text, targetElement) {
        if (text.trim() === '') {
            targetElement.value = '';
            return;
        }
        const url = `https://inputtools.google.com/request?text=${encodeURIComponent(text)}&itc=hi-t-i0-und&num=1&cp=0&cs=1&ie=utf-8&oe=utf-8`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data && data[0] === 'SUCCESS' && data[1] && data[1][0] && data[1][0][1] && data[1][0][1][0]) {
                    // Set the value to the first and most likely suggestion
                    targetElement.value = data[1][0][1][0];
                }
            })
            .catch(error => console.error('Auto-transliteration error:', error));
    }

    // Create a debounced version of the autoTransliterate function
    const debouncedAutoTransliterate = debounce(autoTransliterate, 300);

    // --- SECTION 3: EVENT LISTENERS (Using Delegation) ---

    document.addEventListener('input', function(e) {
        // Listener for MANUAL refinement on Hindi fields
        if (e.target.classList.contains('hindi-input')) {
            const currentInput = e.target;
            const suggestionsContainer = currentInput.closest('.position-relative').querySelector('.suggestions-container');
            if (suggestionsContainer) {
                fetchSuggestions(currentInput.value, suggestionsContainer, currentInput);
            }
        }

        // Listener for AUTOMATIC transliteration from English fields
        if (e.target.classList.contains('english-input')) {
            const currentInput = e.target;
            const targetSelector = currentInput.dataset.targetFor;
            const targetElement = document.querySelector(targetSelector);
            if (targetElement) {
                // Call the debounced function
                debouncedAutoTransliterate(currentInput.value, targetElement);
            }
        }
    });

    // Hide suggestions if the user clicks anywhere else
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.position-relative')) {
            document.querySelectorAll('.suggestions-container').forEach(container => {
                container.classList.add('d-none');
            });
        }
    });
});
