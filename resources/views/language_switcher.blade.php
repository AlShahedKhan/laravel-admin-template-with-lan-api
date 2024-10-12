<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Switcher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-end">
        <select id="language_with_flag" class="form-select w-auto">
            @foreach ($languages as $language)
                <option value="{{ $language->code }}" 
                    {{ $language->code == Cache::get('locale') ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
    </div>

    <h1 id="welcome_text" class="mt-3">Welcome</h1>
    <button id="login_button" class="btn btn-primary">Login</button>
    <button id="logout_button" class="btn btn-secondary">Logout</button>
</div>

<script>
    $(document).ready(function () {
        // Change language event
        $('#language_with_flag').change(function () {
            let selectedLanguage = $(this).val();

            $.ajax({
                url: `/api/languages/json/${selectedLanguage}`,
                method: 'GET',
                success: function (data) {
                    $('#welcome_text').text(data.welcome);
                    $('#login_button').text(data.login);
                    $('#logout_button').text(data.logout);

                    // Update selected language in cache
                    $.ajax({
                        url: `/api/languages/change`,
                        method: 'POST',
                        data: { code: selectedLanguage },
                        success: function (response) {
                            console.log(response.message);
                        }
                    });
                },
                error: function (err) {
                    console.error('Error fetching language data:', err);
                }
            });
        });
    });
</script>

</body>
</html>
