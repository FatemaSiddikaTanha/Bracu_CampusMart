<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <title>My Profile</title>
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Segoe UI';
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        h2 {
            font-weight: 700;
            color: #333;
        }

        label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74,144,226,0.4);
        }

        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #357ab8;
            border-color: #357ab8;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-radius: 8px;
            padding: 12px;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 8px;
            padding: 12px;
        }

        /* Adjust select dropdown */
        select.form-control {
            height: 45px;
        }

        input[type="date"] {
            height: 45px;
        }
    </style>
</head>
<body>
    <div class="container mt-5" style="max-width: 650px;">
        <h2 class="text-center mb-4">My Profile</h2>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Profile form -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="form-group mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
            </div>

            <!-- Email (readonly) -->
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" value="{{ $user->email }}" class="form-control" disabled>
            </div>

            <!-- Phone -->
            <div class="form-group mb-3">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
            </div>

            <!-- Address -->
            <div class="form-group mb-3">
                <label>Address</label>
                <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control">
            </div>

            <!-- Gender -->
            <div class="form-group mb-3">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="">Select</option>
                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Date of Birth -->
            <div class="form-group mb-4">
                <label>Date of Birth</label>
                <input type="date" name="dob" value="{{ old('dob', $user->dob) }}" class="form-control">
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary w-50">Update Profile</button>
        </form>
    </div>
</body>
</html>
