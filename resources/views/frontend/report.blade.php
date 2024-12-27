@extends('layouts.app')

@section('content')
<section class="bg-gray-900 text-gray-100">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center">Report an Issue</h2>
      <p class="mb-8 lg:mb-16 font-light text-center sm:text-xl">
          If you have an issue with a post, feature, forgot your password, or want to delete your account, please report it here. The admin will process your request.
      </p>
      <form id="report-form" class="space-y-8">
          <div>
              <label for="name" class="block mb-2 text-sm font-medium">Your Name</label>
              <input type="text" id="name" class="shadow-sm bg-gray-800 border border-gray-700 text-gray-100 text-sm rounded-lg 
                  focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="John Doe" required>
          </div>
          <div>
              <label for="subject" class="block mb-2 text-sm font-medium">Report Title</label>
              <input type="text" id="subject" class="block p-3 w-full text-sm bg-gray-800 text-gray-100 rounded-lg border 
                  border-gray-700 shadow-sm focus:ring-primary-500 focus:border-primary-500" 
                  placeholder="Describe the issue briefly" required>
          </div>
          <div>
              <label for="message" class="block mb-2 text-sm font-medium">Report Description</label>
              <textarea id="message" rows="6" class="block p-2.5 w-full text-sm bg-gray-800 text-gray-100 rounded-lg 
                  shadow-sm border border-gray-700 focus:ring-primary-500 focus:border-primary-500" 
                  placeholder="Describe the issue or request..." required></textarea>
          </div>
          <button type="submit" id="submit-button" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg 
              bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 
              dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
              Send Report
          </button>
      </form>
  </div>
</section>
<script>
  document.getElementById('report-form').addEventListener('submit', function (e) {
      e.preventDefault(); // Prevent form reload

      const submitButton = document.getElementById('submit-button');
      const name = document.getElementById('name').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('message').value;

      // Adding loading effect to the button
      submitButton.innerHTML = `
          <svg role="status" class="inline w-4 h-4 mr-2 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08157 50.5908C9.08157 74.2574 25.8334 91.0093 49.5 91.0093C73.1666 91.0093 89.9184 74.2574 89.9184 50.5908C89.9184 26.9241 73.1666 10.1723 49.5 10.1723C25.8334 10.1723 9.08157 26.9241 9.08157 50.5908Z" fill="#E5E7EB"/>
              <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 96.9885 33.5536C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7236 75.2124 7.41289C69.5422 4.10219 63.2754 1.94025 56.7458 1.0513C51.7667 0.367863 46.7393 0.446016 41.7922 1.27854C39.2115 1.6982 37.738 4.19778 38.3751 6.62326C39.0122 9.04874 41.4716 10.4297 44.0644 10.0605C47.8512 9.49162 51.7191 9.64462 55.5158 10.506C60.864 11.635 65.9746 13.7739 70.6331 16.8478C75.2917 19.9218 79.429 23.8769 82.816 28.4887C85.4557 32.1882 87.5353 36.2565 88.9535 40.555C89.7471 42.9661 92.2461 44.4569 94.6673 43.8229C97.0885 43.1889 98.5766 40.7062 97.7829 38.2951L93.9676 39.0409Z" fill="currentColor"/>
          </svg>
          Sending...
      `;

      // Reset form fields
      document.getElementById('name').value = '';
      document.getElementById('subject').value = '';
      document.getElementById('message').value = '';

      // New note with "Report from Inkspire website"
      const note = "Report from Inkspire website";
      const whatsappUrl = `https://wa.me/6282244623402?text=${encodeURIComponent(note)}%0A%0AName:%20${name}%0ATitle:%20${subject}%0ADescription:%20${message}`;

      // Redirect to WhatsApp with the message
      window.location.href = whatsappUrl;

      // Simulate loading for a while before resetting the button
      setTimeout(() => {
          submitButton.innerHTML = 'Send Report'; // Reset the button
      }, 30000); // Simulate loading for 30 seconds
  });
</script>



@endsection
