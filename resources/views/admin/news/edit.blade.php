<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .form-group { margin-bottom: 15px; }
        .form-control { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn-action { margin-top: 20px; }
        textarea.form-control { min-height: 100px; resize: vertical; }
        input[type="file"] { padding: 5px 0; }
        .current-image {
            max-width: 150px;
            height: auto;
            display: block;
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Edit Berita</h2>
            </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="block">
                    <div class="title"><strong>Form Edit Berita</strong></div>
                    <div class="block-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Penting untuk metode UPDATE --}}

                            <div class="form-group">
                                <label for="title">Judul Berita</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}" maxlength="100" required>
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Sub Judul</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $news->subtitle) }}" maxlength="100" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ old('category',$news->category) }}" maxlength="100" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" required>{{ old('description', $news->description) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Gambar Berita</label>
                                @if($news->image)
                                    <p>Gambar Saat Ini:</p>
                                    <img src="{{ $news->image }}" alt="Current Image" class="current-image">
                                @else
                                    <p>Tidak ada gambar saat ini.</p>
                                @endif
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                                <small class="form-text text-muted">Pilih gambar baru jika ingin mengubah. Format: JPG, PNG, GIF, SVG. Maks: 2MB.</small>
                            </div>

                            <button type="submit" class="btn btn-primary btn-action">Update Berita</button>
                            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-action">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>