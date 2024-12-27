@extends('layouts.app')

@section('content')
<section class="bg-gray-900 text-white">
  <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
    <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm bg-gray-800 rounded-full text-white hover:bg-gray-700" role="alert">
      <span class="text-xs bg-primary-600 rounded-full px-4 py-1.5 mr-3">New</span>
      <span class="text-sm font-medium">Welcome to Our Writing Platform! Discover What's New</span>
      <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
      </svg>
    </a>
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl">A Platform for Talented Writers to Share Their Work</h1>

    <p class="mb-8 text-lg font-normal text-gray-400 lg:text-xl sm:px-16 xl:px-48">
      Our platform provides a space for aspiring writers to share their work, reach a wider audience, and connect with like-minded individuals. Join us to explore and contribute!
    </p>
    <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
      <a href="/login" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
        Become a Writer
        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </a>
      <a href="/blogs" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white border border-gray-700 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-800">
        <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
        </svg>
        View Post
      </a>
    </div>
  </div>
</section>
<section class="bg-gray-900 text-white">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light sm:text-lg">
            <h2 class="mb-4 text-4xl text-white tracking-tight font-extrabold">Platform for Writers</h2>
            <p class="mb-4 text-gray-400">This website is created to provide a space for talented writers to share their work, including posts, short stories, writings, and more. Visitors can read the published content and, if interested, register to become writers themselves. We aim to create a welcoming community where writers can connect, share ideas, and grow together.</p>
            <p class="mb-4 text-gray-400">Our platform offers writers the opportunity to showcase their creativity and receive feedback from a diverse audience. Whether you are an experienced author or a new writer looking to improve your skills, our platform is here to support you.</p>
            <p class="text-gray-400">Join us today and be part of a vibrant community of writers. Share your stories, gain insights from others, and find inspiration. Your voice matters, and we are excited to see the unique perspectives you will bring.</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg" src="https://i.ibb.co.com/M87wwj2/6296471809293402397.jpg" alt="office content 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://i.ibb.co.com/4mNFWGv/6296471809293402396.jpg" alt="office content 2">
        </div>
    </div>
</section>

@endsection