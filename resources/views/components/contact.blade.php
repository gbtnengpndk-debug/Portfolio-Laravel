<section id="contact" class="contact-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Contact</span>

            <h2>Let's Work Together</h2>

            <p>
                Punya pertanyaan, ide, atau ingin bekerja sama?
                Kirim pesan melalui form di bawah.
            </p>
        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('contact.store') }}"
            method="POST"
            class="contact-form"
        >
            @csrf

            <div class="form-group">
                <label for="name">Nama</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Nama kamu"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="email@example.com"
                    maxlength="255"
                    required
                >
            </div>

            <div class="form-group">
                <label for="subject">Telepon</label>

                <input
                    type="text"
                    id="subject"
                    name="subject"
                    value="{{ old('subject') }}"
                    placeholder="Nomor Telepon"
                    maxlength="255"
                >
            </div>

            <div class="form-group">
                <label for="message">Pesan</label>

                <textarea
                    id="message"
                    name="message"
                    rows="6"
                    maxlength="5000"
                    placeholder="Tulis pesan kamu..."
                    required
                >{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="contact-button">
                Kirim Pesan
            </button>

        </form>

    </div>
</section>