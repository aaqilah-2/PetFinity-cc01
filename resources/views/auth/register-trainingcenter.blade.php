<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Training Center Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito|Fredoka+One&display=swap">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7fafc;
            color: #4a5568;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .container {
            display: flex;
            flex-direction: row;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        @media(max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }

        .left-panel {
            background-color: #ff6600;
            padding: 1rem;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .left-panel::before, .left-panel::after {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -100%;
            left: -100%;
            background: rgba(255, 255, 255, 0.1);
            animation: rotate 30s infinite linear;
            z-index: 0;
        }

        .left-panel::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .left-panel h1 {
            font-size: 6rem;
            font-family: 'Fredoka One', cursive;
            color: #ffffff;
            margin-bottom: 1rem;
            z-index: 1;
        }

        .left-panel p {
            color: #000000;
            margin-bottom: 2rem;
            z-index: 1;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .left-panel button {
            background-color: #4e2103;
            color: #ffffff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 2rem;
            z-index: 1;
            animation: fadeIn 3s ease-in-out;
        }

        .left-panel img {
            width: 40   
            max-width: 100%;
            height: auto;
            animation: fadeIn 4s ease-in-out;
            z-index: 1;
            flex-grow: 1;
            object-fit: cover;
        }

        .right-panel {
            padding: 2rem;
            flex: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: #e2e8f0;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            width: 0;
            background-color: #4a5568;
            transition: width 0.4s ease;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4a5568;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #ff6600;
            color: #ffffff;
            border: none;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            width: auto;
            margin-bottom: 1rem;
        }

        .form-group button:hover {
            background-color: #e05500;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-center {
            justify-content: center;
        }

        .error {
            color: red;
            font-size: 0.875rem;
        }

        .status-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;
        }

        .status-bar div {
            width: 30px;
            height: 30px;
            background-color: #e2e8f0;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            font-weight: bold;
            margin: 0 0.5rem;
            position: relative;
        }

        .status-bar div.active {
            background-color: #ff6600;
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background-color: #21e435;
            top: -10px;
            z-index: 9999;
            animation: fall 3s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(0) rotate(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            animation: float 10s infinite;
        }

        .circle1 {
            width: 50px;
            height: 50px;
            top: 20%;
            left: 10%;
            animation-duration: 8s;
        }

        .circle2 {
            width: 70px;
            height: 70px;
            top: 50%;
            left: 30%;
            animation-duration: 12s;
        }

        .circle3 {
            width: 40px;
            height: 40px;
            top: 70%;
            left: 80%;
            animation-duration: 10s;
        }

        .circle4 {
            width: 60px;
            height: 60px;
            top: 90%;
            left: 20%;
            animation-duration: 15s;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-20px);
                opacity: 1;
            }
            100% {
                transform: translateY(0);
                opacity: 0.7;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Petfinity</h1>
            <p>Join us to handle all your infinite pet training management needs and meet our expert trainers!</p>
            <button onclick="location.href='{{ route('login')}}'">Already have an account?</button>
           
        </div>

        <div class="right-panel">
            <div class="progress-bar">
                <div class="progress" id="progress"></div>
            </div>
            <h1 class="mb-6 text-2xl font-bold text-center">Pet Training Center Registration</h1>
            <div class="status-bar">
                <div class="active" id="status1">1</div>
                <div id="status2">2</div>
                <div id="status3">3</div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('pet-trainingcenter.register') }}" onsubmit="return submitForm()" class="w-full" id="registrationForm">
                @csrf
                <div class="section active" id="section1">
                    <h2 class="mb-4 text-xl font-semibold">Essential Information</h2>
                    <div class="form-group">
                        <label for="business_name">Business Name</label>
                        <input id="business_name" class="form-input" type="text" name="business_name" required autofocus autocomplete="business_name" />
                        <div class="error" id="business_name_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Business Email</label>
                        <input id="email" class="form-input" type="email" name="email" required autocomplete="username" />
                        <div class="error" id="email_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input id="phone_number" class="form-input" type="tel" name="phone_number" required autocomplete="tel" />
                        <div class="error" id="phone_number_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input id="city" class="form-input" type="text" name="city" required autocomplete="address-level2" />
                        <div class="error" id="city_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="street_name">Street Name</label>
                        <input id="street_name" class="form-input" type="text" name="street_name" required autocomplete="address-line1" />
                        <div class="error" id="street_name_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input id="postal_code" class="form-input" type="text" name="postal_code" required autocomplete="postal-code" />
                        <div class="error" id="postal_code_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                        <div class="error" id="password_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <div class="error" id="password_confirmation_error"></div>
                    </div>
                    <div class="flex justify-center form-group">
                        <button type="button" onclick="nextSection(1)">Next</button>
                    </div>
                </div>

                <div class="section" id="section2">
                    <h2 class="mb-4 text-xl font-semibold">Training Information</h2>
                    <div class="form-group">
                        <label for="training_specialization">Training Specialization</label>
                        <div class="flex flex-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="training_specialization[]" value="Obedience" class="form-checkbox">
                                <span class="ml-2">Obedience</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_specialization[]" value="Agility" class="form-checkbox">
                                <span class="ml-2">Agility</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_specialization[]" value="Behavior Correction" class="form-checkbox">
                                <span class="ml-2">Behavior Correction</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_specialization[]" value="other" class="form-checkbox">
                                <span class="ml-2">Other</span>
                            </label>
                        </div>
                        <div class="error" id="training_specialization_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="other_training_specialization">Other Training Specialization</label>
                        <textarea id="other_training_specialization" class="form-textarea" name="training_specialization[]" rows="3" placeholder="Enter other training specializations"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="training_methods">Training Methods</label>
                        <div class="flex flex-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="training_methods[]" value="Positive Reinforcement" class="form-checkbox">
                                <span class="ml-2">Positive Reinforcement</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_methods[]" value="Clicker Training" class="form-checkbox">
                                <span class="ml-2">Clicker Training</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_methods[]" value="Obedience Training" class="form-checkbox">
                                <span class="ml-2">Obedience Training</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_methods[]" value="Agility Training" class="form-checkbox">
                                <span class="ml-2">Agility Training</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_methods[]" value="Behavioral Training" class="form-checkbox">
                                <span class="ml-2">Behavioral Training</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="training_methods[]" value="other" class="form-checkbox">
                                <span class="ml-2">Other</span>
                            </label>
                        </div>
                        <div class="error" id="training_methods_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="other_training_methods">Other Training Methods</label>
                        <textarea id="other_training_methods" class="form-textarea" name="training_methods[]" rows="3" placeholder="Enter other training methods"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="preferred_environment">Preferred Environment</label>
                        <div class="flex flex-wrap">
                            <label class="inline-flex items-center">
                                <input type="radio" name="preferred_environment" value="Indoor" class="form-radio">
                                <span class="ml-2">Indoor</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="preferred_environment" value="Outdoor" class="form-radio">
                                <span class="ml-2">Outdoor</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="preferred_environment" value="Both" class="form-radio">
                                <span class="ml-2">Both</span>
                            </label>
                        </div>
                        <div class="error" id="preferred_environment_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="types_of_pets_trained">Types of Pets Trained</label>
                        <div class="flex flex-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="types_of_pets_trained[]" value="Dogs" class="form-checkbox">
                                <span class="ml-2">Dogs</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="types_of_pets_trained[]" value="Cats" class="form-checkbox">
                                <span class="ml-2">Cats</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="checkbox" name="types_of_pets_trained[]" value="other" class="form-checkbox">
                                <span class="ml-2">Other</span>
                            </label>
                        </div>
                        <div class="error" id="types_of_pets_trained_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="other_types_of_pets_trained">Other Types of Pets Trained</label>
                        <textarea id="other_types_of_pets_trained" class="form-textarea" name="types_of_pets_trained[]" rows="3" placeholder="Enter other types of pets trained"></textarea>
                    </div>
                    <div class="flex justify-between form-group">
                        <button type="button" onclick="prevSection(2)">Previous</button>
                        <button type="button" onclick="nextSection(2)">Next</button>
                    </div>
                </div>

                <div class="section" id="section3">
                    <h2 class="mb-4 text-xl font-semibold">Additional Information</h2>
                    <div class="form-group">
                        <label for="socialmedia_links">Social Media Links</label>
                        <input id="socialmedia_links" class="form-input" type="text" name="socialmedia_links" />
                    </div>
                    <div class="form-group">
                        <label for="photos">Photos of Facility</label>
                        <input type="file" id="photos" name="photos[]" accept="image/*" multiple class="file-input">
                        <span class="text-sm text-gray-500">Please upload at least 2 photos, maximum 5.</span>
                    </div>
                    <div class="form-group">
                        <label for="joining_goals">Goals of Joining</label>
                        <select name="joining_goals" id="joining_goals" class="form-select">
                            <option value="increase_customer_base">Increase Customer Base</option>
                            <option value="improve_booking_management">Improve Booking Management</option>
                            <option value="enhance_customer_communication">Enhance Customer Communication</option>
                            <option value="expand_service_offerings">Expand Service Offerings</option>
                            <option value="increase_revenue">Increase Revenue</option>
                            <option value="other">Other: <input type="text" name="other_goal" class="ml-2"></option>
                        </select>
                    </div>
                    <div class="flex justify-between form-group">
                        <button type="button" onclick="prevSection(3)">Previous</button>
                        <button type="submit" onclick="triggerConfetti()">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function nextSection(currentSection) {
            const isValid = validateSection(currentSection);
            if (isValid) {
                document.getElementById('section' + currentSection).classList.remove('active');
                document.getElementById('section' + (currentSection + 1)).classList.add('active');
                document.getElementById('status' + currentSection).classList.remove('active');
                document.getElementById('status' + (currentSection + 1)).classList.add('active');
                updateProgress(currentSection + 1);
            }
        }

        function prevSection(currentSection) {
            document.getElementById('section' + currentSection).classList.remove('active');
            document.getElementById('section' + (currentSection - 1)).classList.add('active');
            document.getElementById('status' + currentSection).classList.remove('active');
            document.getElementById('status' + (currentSection - 1)).classList.add('active');
            updateProgress(currentSection - 1);
        }

        function updateProgress(section) {
            const progress = document.getElementById('progress');
            progress.style.width = (section / 3) * 100 + '%';
        }

        function validateSection(section) {
            let isValid = true;

            if (section === 1) {
                const businessName = document.getElementById('business_name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phoneNumber = document.getElementById('phone_number').value.trim();
                const city = document.getElementById('city').value.trim();
                const streetName = document.getElementById('street_name').value.trim();
                const postalCode = document.getElementById('postal_code').value.trim();
                const password = document.getElementById('password').value.trim();
                const passwordConfirmation = document.getElementById('password_confirmation').value.trim();

                if (!businessName) {
                    isValid = false;
                    document.getElementById('business_name_error').textContent = 'Business Name is required.';
                } else {
                    document.getElementById('business_name_error').textContent = '';
                }

                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!email || !emailPattern.test(email)) {
                    isValid = false;
                    document.getElementById('email_error').textContent = 'Valid email is required.';
                } else {
                    document.getElementById('email_error').textContent = '';
                }

                const phonePattern = /^\d{10}$/;
                if (!phoneNumber || !phonePattern.test(phoneNumber)) {
                    isValid = false;
                    document.getElementById('phone_number_error').textContent = 'Valid phone number is required.';
                } else {
                    document.getElementById('phone_number_error').textContent = '';
                }

                if (!city) {
                    isValid = false;
                    document.getElementById('city_error').textContent = 'City is required.';
                } else {
                    document.getElementById('city_error').textContent = '';
                }

                if (!streetName) {
                    isValid = false;
                    document.getElementById('street_name_error').textContent = 'Street Name is required.';
                } else {
                    document.getElementById('street_name_error').textContent = '';
                }

                if (!postalCode) {
                    isValid = false;
                    document.getElementById('postal_code_error').textContent = 'Postal Code is required.';
                } else {
                    document.getElementById('postal_code_error').textContent = '';
                }

                if (!password) {
                    isValid = false;
                    document.getElementById('password_error').textContent = 'Password is required.';
                } else {
                    document.getElementById('password_error').textContent = '';
                }

                if (password !== passwordConfirmation) {
                    isValid = false;
                    document.getElementById('password_confirmation_error').textContent = 'Passwords do not match.';
                } else {
                    document.getElementById('password_confirmation_error').textContent = '';
                }
            }

            if (section === 2) {
                const trainingSpecialization = document.querySelectorAll('input[name="training_specialization[]"]:checked');
                const preferredEnvironment = document.querySelectorAll('input[name="preferred_environment"]:checked');

                if (trainingSpecialization.length === 0) {
                    isValid = false;
                    document.getElementById('training_specialization_error').textContent = 'At least one training specialization is required.';
                } else {
                    document.getElementById('training_specialization_error').textContent = '';
                }

                if (preferredEnvironment.length === 0) {
                    isValid = false;
                    document.getElementById('preferred_environment_error').textContent = 'Preferred environment is required.';
                } else {
                    document.getElementById('preferred_environment_error').textContent = '';
                }

                const typesOfPetsTrained = document.querySelectorAll('input[name="types_of_pets_trained[]"]:checked');
                if (typesOfPetsTrained.length === 0) {
                    isValid = false;
                    document.getElementById('types_of_pets_trained_error').textContent = 'At least one type of pet trained is required.';
                } else {
                    document.getElementById('types_of_pets_trained_error').textContent = '';
                }
            }

            return isValid;
        }

        function submitForm() {
            const isValid = validateSection(3);
            if (isValid) {
                const businessName = document.getElementById('business_name').value;
                document.getElementById('business-name-display').textContent = businessName;
                triggerConfetti();
                return true; // Ensure form submission
            }
            return false; // Prevent form submission if validation fails
        }

        function triggerConfetti() {
            for (let i = 0; i < 100; i++) {
                createConfetti();
            }
        }

        function createConfetti() {
            const confetti = document.createElement('div');
            confetti.classList.add('confetti');
            confetti.style.left = Math.random() * 100 + '%';
            confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
            document.body.appendChild(confetti);
            setTimeout(() => confetti.remove(), 3000);
        }
    </script>
</body>
</html>
