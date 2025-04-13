@extends('layouts.layout')

@section('content')
<!-- Bản đồ Bắt Đầu -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<!-- Bản đồ Kết Thúc -->

<!-- Phần Liên Hệ Bắt Đầu -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Thông Tin</span>
                        <h2>Liên Hệ Với Chúng Tôi</h2>
                        <p>Như bạn có thể mong đợi từ một công ty bắt đầu như là một nhà thầu nội thất cao cấp, chúng tôi chú trọng đến từng chi tiết.</p>
                    </div>
                    <ul>
                        <li>
                            <h4>Đà Nẵng</h4>
                            <p>256 Âu Cơ - Hoà Khánh Bắc - Liên Chiểu - Đà Nẵng <br />+84 364 941 253 <br />vothithanhtram03@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="name" placeholder="Họ và Tên" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Lời Nhắn" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="site-btn">Gửi Lời Nhắn</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Phần Liên Hệ Kết Thúc -->
@endsection
