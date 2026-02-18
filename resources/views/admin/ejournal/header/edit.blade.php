@extends('admin.partials.Layouts.master')

@section('title', 'Header Settings | Admin')
@section('title-sub', 'Settings')
@section('pagetitle', 'Header Settings')

@section('content')
    @php
        $header = $header ?? [];
        $social = (array) data_get($header, 'social', []);

        $contacts = old('header.contacts', data_get($header, 'contacts'));
        if (!is_array($contacts)) {
            $contacts = [];
        }
        if (count($contacts) === 0) {
            $email = (string) data_get($header, 'email', 'medopenpress@outlook.com');
            $phone = (string) data_get($header, 'phone', '+62 897 1399 093');
            $phoneHref = (string) data_get($header, 'phone_href', '+628971399093');
            $location = (string) data_get($header, 'location', 'Jakarta, Indonesia');

            $contacts = [
                ['icon' => 'icon-mail', 'text' => $email, 'href' => $email ? ('mailto:' . $email) : ''],
                ['icon' => 'icon-phone-call', 'text' => $phone, 'href' => $phoneHref ? ('tel:' . $phoneHref) : ''],
                ['icon' => 'icon-pin-1', 'text' => $location, 'href' => ''],
            ];
        }

        $socials = old('header.socials', data_get($header, 'socials'));
        if (!is_array($socials)) {
            $socials = [];
        }
        if (count($socials) === 0) {
            $socials = [
                ['icon' => 'icon-facebook-app-symbol', 'url' => (string) data_get($social, 'facebook', '')],
                ['icon' => 'icon-pinterest', 'url' => (string) data_get($social, 'pinterest', '')],
                ['icon' => 'icon-linkedin-big-logo', 'url' => (string) data_get($social, 'linkedin', '')],
                ['icon' => 'icon-instagram', 'url' => (string) data_get($social, 'instagram', '')],
            ];
        }

        $logoPath = data_get($header, 'logo_path');
        $logoUrl = $logoPath ? asset('storage/' . ltrim($logoPath, '/')) : asset('assets/images/resources/logoMed.png');

        $faviconPath = data_get($header, 'favicon_path');
        $faviconUrl = $faviconPath ? asset('storage/' . ltrim($faviconPath, '/')) : asset('assets/images/favicons/favicon-32x32.png');
    @endphp

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-0">Header Navigation</h5>
                        <div class="text-muted small">Controls the top bar contact info, social links, and header logo.</div>
                        <div class="text-muted small">Tip: Icon Class uses the theme icon names (example: <code>icon-mail</code>, <code>icon-phone-call</code>). If you put an unknown icon class, the icon may not show.</div>
                    </div>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary btn-sm">Preview Website</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.ejournal.header.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-12">
                                <h6 class="mb-1">Contact</h6>
                                <div class="text-muted small">Add/remove items in the header top bar.</div>
                                <div class="text-muted small">If <strong>Href</strong> is empty, the text shows without a link.</div>
                            </div>

                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle mb-2" id="contactsTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 220px">Icon Class</th>
                                                <th>Text</th>
                                                <th>Href (optional)</th>
                                                <th style="width: 80px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contacts as $i => $c)
                                                <tr>
                                                    <td>
                                                        <input class="form-control" name="header[contacts][{{ $i }}][icon]" value="{{ data_get($c, 'icon') }}" placeholder="icon-mail">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="header[contacts][{{ $i }}][text]" value="{{ data_get($c, 'text') }}" placeholder="medopenpress@outlook.com">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="header[contacts][{{ $i }}][href]" value="{{ data_get($c, 'href') }}" placeholder="mailto:... / tel:...">
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-outline-danger btn-sm js-remove-row">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" id="addContactRow">Add Contact</button>
                                <div class="form-text">Href examples: <code>mailto:email@domain.com</code>, <code>tel:+628...</code>, or a normal URL <code>https://...</code>.</div>
                            </div>

                            <div class="col-12 mt-2">
                                <hr class="my-2">
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Favicon</h6>
                                <div class="text-muted small">Shown in the browser tab. Recommended: square PNG (32×32 or 48×48).</div>
                                <div class="text-muted small">Browsers cache favicons strongly—after saving, do hard refresh or clear cache if it doesn't change.</div>
                            </div>

                            <div class="col-12 col-md-3">
                                <img src="{{ $faviconUrl }}" alt="" style="width: 32px; height: 32px; object-fit: contain;" />
                            </div>
                            <div class="col-12 col-md-9">
                                <label class="form-label">Favicon image</label>
                                <input type="file" class="form-control" name="header[favicon_file]" accept="image/*">
                                <div class="form-text">Max 1MB. Stored in public storage (<code>/storage/...</code>). If the image doesn't load, ensure <code>php artisan storage:link</code> is set on the server.</div>
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Social</h6>
                                <div class="text-muted small">Leave blank to hide the icon link.</div>
                                <div class="text-muted small">Both Icon Class and URL must be filled, otherwise the item is hidden.</div>
                            </div>

                            <div class="col-12 col-md-3">
                                <label class="form-label">Follow title</label>
                                <input class="form-control" name="header[follow_title]" value="{{ old('header.follow_title', data_get($header, 'follow_title', 'Follow Us')) }}">
                            </div>
                            <div class="col-12 col-md-9"></div>

                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle mb-2" id="socialsTable">
                                        <thead>
                                            <tr>
                                                <th style="width: 260px">Icon Class</th>
                                                <th>URL</th>
                                                <th style="width: 80px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($socials as $i => $s)
                                                <tr>
                                                    <td>
                                                        <input class="form-control" name="header[socials][{{ $i }}][icon]" value="{{ data_get($s, 'icon') }}" placeholder="icon-instagram">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="header[socials][{{ $i }}][url]" value="{{ data_get($s, 'url') }}" placeholder="https://...">
                                                    </td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-outline-danger btn-sm js-remove-row">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm" id="addSocialRow">Add Social</button>
                            </div>

                            <div class="col-12 mt-2">
                                <hr class="my-2">
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Logo</h6>
                                <div class="text-muted small">Upload a new logo to replace the current one.</div>
                                <div class="text-muted small">If logo doesn't appear after upload, check storage link (<code>php artisan storage:link</code>).</div>
                            </div>

                            <div class="col-12 col-md-3">
                                <img src="{{ $logoUrl }}" alt="" style="height: 36px; width: auto;" />
                            </div>
                            <div class="col-12 col-md-9">
                                <label class="form-label">Logo image</label>
                                <input type="file" class="form-control" name="header[logo_file]" accept="image/*">
                                <div class="form-text">Max 2MB. Stored in public storage.</div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Logo alt text</label>
                                <input class="form-control" name="header[logo_alt]" value="{{ old('header.logo_alt', data_get($header, 'logo_alt', 'Med Open Press')) }}">
                            </div>

                            <div class="col-12 mt-2">
                                <hr class="my-2">
                            </div>

                            <div class="col-12">
                                <h6 class="mb-1">Consultation Button</h6>
                                <div class="text-muted small">Shown on the right side of the header.</div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Button text</label>
                                <input class="form-control" name="header[consultation_text]" value="{{ old('header.consultation_text', data_get($header, 'consultation_text', 'Consultation')) }}">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label">Button URL</label>
                                <input class="form-control" name="header[consultation_url]" value="{{ old('header.consultation_url', data_get($header, 'consultation_url', 'https://wa.me/628971399093')) }}" placeholder="https://...">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">Save Header Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <template id="contactRowTemplate">
        <tr>
            <td><input class="form-control" data-name="icon" placeholder="icon-mail"></td>
            <td><input class="form-control" data-name="text" placeholder="medopenpress@outlook.com"></td>
            <td><input class="form-control" data-name="href" placeholder="mailto:... / tel:..."></td>
            <td class="text-end"><button type="button" class="btn btn-outline-danger btn-sm js-remove-row">Remove</button></td>
        </tr>
    </template>

    <template id="socialRowTemplate">
        <tr>
            <td><input class="form-control" data-name="icon" placeholder="icon-instagram"></td>
            <td><input class="form-control" data-name="url" placeholder="https://..."></td>
            <td class="text-end"><button type="button" class="btn btn-outline-danger btn-sm js-remove-row">Remove</button></td>
        </tr>
    </template>

    <script>
        (function() {
            document.addEventListener('DOMContentLoaded', function() {
                var contactsTable = document.getElementById('contactsTable');
                var socialsTable = document.getElementById('socialsTable');

                function wireRemoveButtons(root) {
                    root.querySelectorAll('.js-remove-row').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            var tr = btn.closest('tr');
                            if (tr) tr.remove();
                        });
                    });
                }

                function addContactRow() {
                    var tpl = document.getElementById('contactRowTemplate');
                    var tbody = contactsTable.querySelector('tbody');
                    var index = tbody.querySelectorAll('tr').length;

                    var fragment = tpl.content.cloneNode(true);
                    fragment.querySelectorAll('input[data-name]').forEach(function(input) {
                        var key = input.getAttribute('data-name');
                        input.name = 'header[contacts][' + index + '][' + key + ']';
                    });

                    tbody.appendChild(fragment);
                    wireRemoveButtons(tbody);
                }

                function addSocialRow() {
                    var tpl = document.getElementById('socialRowTemplate');
                    var tbody = socialsTable.querySelector('tbody');
                    var index = tbody.querySelectorAll('tr').length;

                    var fragment = tpl.content.cloneNode(true);
                    fragment.querySelectorAll('input[data-name]').forEach(function(input) {
                        var key = input.getAttribute('data-name');
                        input.name = 'header[socials][' + index + '][' + key + ']';
                    });

                    tbody.appendChild(fragment);
                    wireRemoveButtons(tbody);
                }

                wireRemoveButtons(document);

                var addContactBtn = document.getElementById('addContactRow');
                if (addContactBtn) {
                    addContactBtn.addEventListener('click', addContactRow);
                }

                var addSocialBtn = document.getElementById('addSocialRow');
                if (addSocialBtn) {
                    addSocialBtn.addEventListener('click', addSocialRow);
                }
            });
        })();
    </script>
@endsection
