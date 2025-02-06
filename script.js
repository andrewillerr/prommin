function login() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // ตรวจสอบข้อมูลผู้ใช้ (สำหรับตัวอย่างนี้คือ user และ password)
    if (username === 'user' && password === 'password') {
        // ซ่อนหน้า Login และแสดง Navbar
        document.getElementById('login-container').style.display = 'none';
        document.getElementById('navbar').style.display = 'block';
    } else {
        // แสดงข้อความผิดพลาดหากข้อมูลไม่ถูกต้อง
        document.getElementById('error-message').style.display = 'block';
    }
}
