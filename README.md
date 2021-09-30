# adotrick
web post video hướng dẫn adobe PTS, Pr, Ae

## Hướng dẫn sử dụng
1. Pull source code
2. Chỉnh sửa các file config trong application/config/development cho phù hợp với local (lưu ý không push 2 file này)
3. Code chủ yếu nằm trong thư mục modules/
   - Từ nay mỗi chức năng lớn sẽ gọi là 1 module, ví dụ: module admin, module video
   - Khi tạo một chức năng lớn thì tạo 1 folder bên trong modules/, ví dụ: modules/test/ và folder này phải bao gồm 3 folder nhỏ
	     + controllers: chứa các file controller 
	     + models: chứa các file model
	     + views: chứa các file view

Chạy sql/test.sql và tham khảo modules/test để hiểu thêm 
	 
