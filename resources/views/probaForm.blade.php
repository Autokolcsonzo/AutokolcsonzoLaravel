<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Example Form Validation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>Laravel 8 Form Validation Tutorial</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('regisztracio') }}">
                    @csrf
                    <div class="form-group">
                        <label for="vezeteknev">vezeteknev</label>
                        <input type="text" id="vezeteknev" name="vezeteknev"
                            class="@error('vezeteknev') is-invalid @enderror form-control">
                        @error('vezeteknev')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keresztnev">keresztnev</label>
                        <input type="text" id="keresztnev" name="keresztnev"
                            class="@error('keresztnev') is-invalid @enderror form-control">
                        @error('keresztnev')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="felhasznalonev">felhasznalonev</label>
                        <input type="text" id="felhasznalonev" name="felhasznalonev"
                            class="@error('felhasznalonev') is-invalid @enderror form-control">
                        @error('felhasznalonev')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="e_mail">Email</label>
                        <input type="email" id="e_mail" name="e_mail"
                            class="@error('e_mail') is-invalid @enderror form-control">
                        @error('e_mail')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jelszo">jelszo</label>
                        <input type="password" id="jelszo1" name="jelszo" placeholder="******"
                            class="@error('jelszo') is-invalid @enderror form-control">
                        @error('jelszo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="szul_ido">group</label>
                        <input type="date" id="szul_ido" name="szul_ido"
                            class="@error('szul_ido') is-invalid @enderror form-control">
                        @error('szul_ido')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tel_szam">tel_szam</label>
                        <input type="text" id="tel_szam" name="tel_szam"
                            class="@error('tel_szam') is-invalid @enderror form-control">
                        @error('tel_szam')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ir_szam">ir_szam</label>
                        <input type="text" id="ir_szam" name="ir_szam"
                            class="@error('ir_szam') is-invalid @enderror form-control">
                        @error('ir_szam')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="megye">megye</label>
                        <input type="text" id="megye" name="megye"
                            class="@error('megye') is-invalid @enderror form-control">
                        @error('megye')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="varos">varos</label>
                        <input type="text" id="varos" name="varos"
                            class="@error('varos') is-invalid @enderror form-control">
                        @error('varos')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="utca">utca</label>
                        <input type="text" id="utca" name="utca"
                            class="@error('utca') is-invalid @enderror form-control">
                        @error('utca')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hazszam">hazszam</label>
                        <input type="text" id="hazszam" name="hazszam"
                            class="@error('hazszam') is-invalid @enderror form-control">
                        @error('hazszam')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>