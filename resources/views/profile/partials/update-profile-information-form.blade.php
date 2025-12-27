<section class="modern-profile-section">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #06b6d4;
            --dark-color: #1e293b;
            --light-bg: #f8fafc;
        }

        .modern-profile-section {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .modern-profile-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
            border-radius: 50%;
            transform: translate(30%, -30%);
            z-index: 0;
        }

        .modern-profile-section > * {
            position: relative;
            z-index: 1;
        }

        /* Header */
        .section-header {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-subtitle {
            color: #64748b;
            font-size: 0.9375rem;
            line-height: 1.6;
        }

        /* Form */
        .profile-form {
            margin-top: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.75rem;
            font-size: 0.9375rem;
        }

        .label-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15) 0%, rgba(139, 92, 246, 0.15) 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .form-input:focus {
            background: white;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .form-input.error {
            border-color: var(--danger-color);
        }

        .input-error {
            color: var(--danger-color);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        /* Verification alert */
        .verification-alert {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.05) 100%);
            border: 2px solid var(--warning-color);
            border-radius: 16px;
            padding: 1rem 1.25rem;
            margin-top: 0.75rem;
        }

        .verification-text {
            color: var(--warning-color);
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .verification-button {
            color: var(--primary-color);
            text-decoration: underline;
            font-weight: 600;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
            padding: 0;
        }

        .verification-button:hover {
            color: var(--secondary-color);
        }

        .success-message {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            border: 2px solid var(--success-color);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            margin-top: 0.75rem;
            color: var(--success-color);
            font-size: 0.875rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Buttons */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 2px solid #f1f5f9;
        }

        .btn-primary {
            padding: 0.875rem 2.5rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
        }

        .saved-message {
            color: var(--success-color);
            font-size: 0.875rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
            border-radius: 50px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .modern-profile-section {
                padding: 1.5rem;
                border-radius: 16px;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-primary {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <!-- Header -->
    <header class="section-header">
        <h2 class="section-title">
            <i class="bi bi-person-circle"></i>
            {{ __('Informations de profil') }}
        </h2>
        <p class="section-subtitle">
            {{ __("Mettez à jour les informations de votre compte.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')

        <!-- Nom -->
        <div class="form-group">
            <label for="lastname" class="form-label">
                <span class="label-icon">
                    <i class="bi bi-person"></i>
                </span>
                {{ __('Nom') }}
            </label>
            <input 
                id="lastname" 
                name="lastname" 
                type="text" 
                class="form-input @error('lastname') error @enderror" 
                value="{{ old('lastname', $user->lastname) }}" 
                required 
                autofocus 
                autocomplete="lastname" 
            />
            @error('lastname')
                <div class="input-error">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Prénoms -->
        <div class="form-group">
            <label for="firstname" class="form-label">
                <span class="label-icon">
                    <i class="bi bi-person-badge"></i>
                </span>
                {{ __('Prénoms') }}
            </label>
            <input 
                id="firstname" 
                name="firstname" 
                type="text" 
                class="form-input @error('firstname') error @enderror" 
                value="{{ old('firstname', $user->firstname) }}" 
                required 
                autofocus 
                autocomplete="firstname" 
            />
            @error('firstname')
                <div class="input-error">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email" class="form-label">
                <span class="label-icon">
                    <i class="bi bi-envelope"></i>
                </span>
                {{ __('Email') }}
            </label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="form-input @error('email') error @enderror" 
                value="{{ old('email', $user->email) }}" 
                required 
                autocomplete="username" 
            />
            @error('email')
                <div class="input-error">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $message }}
                </div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="verification-alert">
                    <p class="verification-text">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        {{ __('Adresse email non vérifiée.') }}
                    </p>
                    <button form="send-verification" class="verification-button">
                        {{ __('Réenvoyer le mail de vérification') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <div class="success-message">
                            <i class="bi bi-check-circle-fill"></i>
                            {{ __('Un nouveau lien de vérification vous a été envoyé.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="submit" class="btn-primary">
                <i class="bi bi-check-circle"></i>
                {{ __('Mettre à jour') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="saved-message"
                >
                    <i class="bi bi-check-circle-fill"></i>
                    {{ __('Enregistré.') }}
                </div>
            @endif
        </div>
    </form>
</section>