document.addEventListener('DOMContentLoaded', () => {
    const consentSection = document.getElementById('consent-section');
    const feedbackSection = document.getElementById('feedback-section');
    const consentYesButton = document.getElementById('consent-yes');
    const consentNoButton = document.getElementById('consent-no');
    const starButtons = document.querySelectorAll('.star-btn');
    const feedbackForm = document.getElementById('feedback-form');
    const yesNoQuestions = document.getElementById('yesno-questions');
  
    // Consent Form: Show Feedback Form if 'Yes' is clicked
    consentYesButton.addEventListener('click', () => {
      consentSection.classList.add('hidden');
      feedbackSection.classList.remove('hidden');
    });
  
    consentNoButton.addEventListener('click', () => {
      alert('Thank you for your time. You may leave the page.');
    });
  
    // Star Rating: Allow users to click stars and set their rating
    starButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const ratingValue = button.dataset.value;
        starButtons.forEach((btn) => btn.classList.remove('selected'));
        for (let i = 0; i < ratingValue; i++) {
          starButtons[i].classList.add('selected');
        }
      });
    });
  
    // Handle Form Submission
    feedbackForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      // Collect Star Rating
      const rating = [...starButtons].filter((btn) => btn.classList.contains('selected')).length;
  
      // Collect Yes/No Question Responses
      const yesNoAnswers = {};
      yesNoQuestions.querySelectorAll('input[type="radio"]:checked').forEach((input) => {
        yesNoAnswers[input.name] = input.value;
      });
  
      // Display Collected Feedback (for now, in console)
      console.log('Rating:', rating);
      console.log('Yes/No Answers:', yesNoAnswers);
  
      // Show a thank-you message
      alert('Thank you for your feedback!');
  
      // Reset the form for future submissions (optional)
      feedbackForm.reset();
      starButtons.forEach((btn) => btn.classList.remove('selected'));
    });
  });
  