@extends('app')
@section('content')
<div class="welcome-container">
    <h1>Welcome to the Anjedny Dashboard!</h1>
    <p>Your go-to place for all things Sercives .</p>
</div>

<style>
    .welcome-container {
        background-color: #3777bb; /* نفس اللون الأزرق للـ sidebar */
        color: black; /* اللون الأسود للنص */
        padding: 50px 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* إضافة ظل للمستطيل */
        position: absolute;
        bottom: 50%; /* يجعل المستطيل يظهر في منتصف الصفحة تقريبًا */
        transform: translateY(50%); /* ينقل المستطيل إلى المنتصف من أسفل */
        width: 80%; /* عرض المستطيل */
        max-width: 600px; /* الحد الأقصى للعرض */
        animation: slideUp 1s ease-out; /* إضافة حركة انزلاق للمستطيل */
        margin-left: 25%; /* إبعاد المستطيل عن الـ sidebar */
    }

    /* تأثير حركة انزلاق للمستطيل */
    @keyframes slideUp {
        0% {
            transform: translateY(100%); 
            opacity: 0;
        }
        100% {
            transform: translateY(50%); 
            opacity: 1;
        }
    }
</style>
@endsection