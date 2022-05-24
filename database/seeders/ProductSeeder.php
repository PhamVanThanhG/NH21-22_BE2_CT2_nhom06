<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([[
            'name' => "MSI Gaming GF63",
            'type_id' => 3,
            'description' => "Sở hữu một vẻ ngoài độc đáo, mạnh mẽ phù hợp với mọi game thủ, chiếc laptop MSI Gaming GF63 Thin 11UD i7 11800H (648VN) được trang bị dòng chip Intel thế hệ 11 hiệu năng mạnh mẽ vượt trội khi đi cùng card màn hình rời RTX 3050 Ti Max-Q sẵn sàng chiến mượt bất kì tựa game phổ biến hay thiết kế đồ họa chuyên sâu.",
            'image' => "msi-gaming-gf63-thin-11ud-i7-648vn-3.jpg",
            'price' => 2799,
            'discount_id' => 3,
            // 'created_at' => '2018-07-20',
            'feature' => 0,
            
        ],
        [
            'name' => "Acer Nitro 5",
            'type_id' => 3,
            'description' => "Laptop Acer Nitro 5 Gaming AN515 57 5831 i5 (NH.QDGSV.003) là thế hệ laptop gaming mới của nhà Acer có nhiều thay đổi trong thiết kế. Hiệu năng vẫn giữ vững phong độ, tự tin mang đến cho game thủ trải nghiệm chơi game cực đã. ",
            'image' => "acer-nitro-5-gaming-an515-57-5831-i5-nhqdgsv003-270721-1044374.jpg",
            'price' => 2639,
            'discount_id' => 1,
            // 'created_at' => '2018-07-20',
            'feature' => 0,
            
        ],
        [
            'name' => "Dell Gaming Alienware",
            'type_id' => 3,
            'description' => "Laptop Dell Gaming Alienware m15 R6 i7 11800H (P109F001DBL) sở hữu thiết kế độc đáo đậm chất gaming cùng cấu hình vượt trội sẵn sàng đáp ứng hoàn hảo mọi tác vụ từ đồ họa - kỹ thuật tới những trận chiến game đầy kịch tính.",
            'image' => "dell-gaming-alienware-m15-r6-i7-p109f001dbl-2-1.jpg",
            'price' => 6199,
            'discount_id' => 4,
            // 'created_at' => '2019-02-20',
            'feature' => 1,
            
        ],
        [
            'name' => "Lenovo Gaming Legion 5",
            'type_id' => 3,
            'description' => "Sở hữu vẻ ngoài cá tính cùng hiệu năng vượt trội, laptop Lenovo Gaming Legion 5 15ITH6 i7 11800H (82JK00FNVN) sẵn sàng đáp ứng mọi nhu cầu của người dùng từ văn phòng, game giải trí đến đồ hoạ - kỹ thuật chuyên sâu.",
            'image' => "vi-vn-lenovo-gaming-legion-5-15ith6-i7-82jk00fnvn-2.jpg",
            'price' => 3899,
            'discount_id' => 3,
            // 'created_at' => '2018-03-20',
            'feature' => 0,
            
        ],
        [
            'name' => "Asus TUF Gaming",
            'type_id' => 3,
            'description' => "Mặc dù sở hữu kiểu dáng đơn giản nhưng chiếc Asus TUF Gaming FX516PM i7 11370H (HN002W) này lại mang một cấu hình vượt trội nhờ sở hữu chip thế hệ 11 cùng card đồ hoạ rời, đánh bật mọi đối thủ.",
            'image' => "vi-vn-asus-tuf-gaming-fx516pm-i7-hn002w-5.jpg",
            'price' => 3299,
            'discount_id' => 2,
            // 'created_at' => '2018-07-20',
            'feature' => 1,
            
        ],
        [
            'name' => "Apple MacBook Pro M1",
            'type_id' => 3,
            'description' => "Apple Macbook Pro M1 2020 được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, chiếc laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt cho lĩnh vực đồ họa, kỹ thuật.",
            'image' => "apple-macbook-pro-2020-z11c-061220-1119080.jpg",
            'price' => 4199,
            'discount_id' => 1,
            // 'created_at' => '2018-07-20',
            'feature' => 0,
            
        ],
        [
            'name' => "Acer Predator Triton PT315",
            'type_id' => 3,
            'description' => "Trải nghiệm chơi game cực mượt mà trên chiếc laptop Acer Predator Triton 300 PT315 53 71DJ i7 (NH.QDSSV.001) mang trong mình bộ xử lý Intel thế hệ 11 mạnh mẽ cân được nhiều tựa game hot.",
            'image' => "vi-vn-acer-predator-triton-300-pt315-53-71dj-i7-4.jpg",
            'price' => 4089,
            'discount_id' => 4,
            // 'created_at' => '2014-07-15',
            'feature' => 0,
            
        ],
        [
            'name' => "MSI Gaming Leopard GP76",
            'type_id' => 3,
            'description' => "Laptop MSI GP76 11UG i7 (435VN) thiết kế cực ngầu, cấu hình cực mạnh với bộ vi xử lý Gen 11 từ nhà Intel, không những thoả sức trở thành game thủ trên mọi tựa game mà còn có thể đáp ứng các tác vụ đồ hoạ, kỹ thuật chuyên nghiệp.",
            'image' => "vi-vn-msi-gp76-11ug-i7-435vn.jpg",
            'price' => 4934,
            'discount_id' => 1,
            // 'created_at' => '2020-07-15',
            'feature' => 1,
            
        ],
        [
            'name' => "MSI Gaming GS66 Stealth",
            'type_id' => 3,
            'description' => "Xứng danh tay chơi cự phách nơi đô thị sầm uất, laptop MSI Gaming GS66 Stealth 11UG i7 11800H (219VN) với vẻ ngoài đầy mạnh mẽ cùng sức mạnh tuyệt hảo, phát huy hiệu suất tối ưu và khả năng chiến game cực đã cùng đồng đội.",
            'image' => "vi-vn-msi-gaming-gs66-stealth-11ug-i7-219vn-1.jpg",
            'price' => 6074,
            'discount_id' => 3,
            
            'feature' => 1,
            
        ],
        [
            'name' => "Gigabyte Gaming G5",
            'type_id' => 3,
            'description' => "Gigabyte Gaming G5 (KC-5S11130SB) luôn sẵn sàng tác chiến cùng bạn trên mọi chiến trường ảo với sức mạnh hiệu năng bộc phá cùng lối thiết kế hiện đại, đậm tính thời trang, hứa hẹn mang đến những trải nghiệm giải trí hoàn hảo.",
            'image' => "vi-vn-gigabyte-gaming-g5-i5-kc5s11130sb-1.jpg",
            'price' => 2699,
            'discount_id' => 1,
            
            'feature' => 1,
            
        ],
        [
            'name' => "Camera TP-Link Tapo C210",
            'type_id' => 1,
            'description' => "TP-Link Tapo C210 quay bao quát toàn bộ không gian, không những giúp bạn thu thập dữ liệu giá trị tối ưu mà còn tiết kiệm chi phí khi không cần phải mua nhiều camera giám sát cho 1 khu vực nhất định.",
            'image' => "camera-ip-360-do-3mp-tp-link-tapo-c210-2-1-org.jpg",
            'price' => 899,
            'discount_id' => 4,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Camera IP Cue 2E-D Trắng",
            'type_id' => 1,
            'description' => "Camera IP 1080P Imou Cue 2E-D được hỗ trợ điều chỉnh góc quay thủ công với chốt chân đế xoay linh hoạt, góc xoay ngang 89°, dọc 46°, góc nhìn chéo đến 108° có thể lựa chọn góc ghi hình để bao quát tốt không gian cần giám sát, thích hợp sử dụng trong nhà.",
            'image' => "camera-ip-1080p-imou-cue-2e-d-trang-1.jpg",
            'price' => 714,
            'discount_id' => 2,
            
            'feature' => 1,
            
        ],
        [
            'name' => "Camera IP Bullet 2E-D Trắng",
            'type_id' => 1,
            'description' => "Nhỏ gọn, hiện đại, sử dụng phù hợp cả ngoài trời nhờ chuẩn chống bụi, chống nước IP67. Tiêu cự tốt, góc xoay chéo 120°, góc dọc 54°, xoay ngang 102° quan sát bao quát không gian.",
            'image' => "camera-ip-ngoai-troi-2mp-imou-bullet-2e-d-trang-9.jpg",
            'price' => 1253,
            'discount_id' => 1,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Camera Vietmap C63 Đen",
            'type_id' => 1,
            'description' => "Camera được trang bị hai ống kính có thể ghi hình cùng lúc trước và trong xe. Thiết bị đồng thời hỗ trợ ghi hình với thông tin GPS giúp lưu trữ hình ảnh với thông tin tốc độ, tọa độ.",
            'image' => "camera-hanh-trinh-vietmap-c63-den-2-org.jpg",
            'price' => 2944,
            'discount_id' => 3,
            
            'feature' => 1,
            
        ],
        [
            'name' => "Camera IP 1080P Ezviz CS-C1HC",
            'type_id' => 1,
            'description' => "Camera IP 1080P Ezviz CS-C1HC (D0-1D2WFR) trắng có thiết kế nhỏ gọn, phù hợp đặt ở nhiều không gian khác nhau trong căn phòng của bạn mà không làm mất tính thẩm mỹ của căn phòng. Có thể đặt để bàn hoặc treo tường chắc chắn nhờ có 2 miếng keo dán tặng kèm sản phẩm.",
            'image' => "camera-ip-1080p-ezviz-cs-c1hc-d0-1d2wfr-trang-2-1-org.jpg",
            'price' => 553,
            'discount_id' => 4,
            
            'feature' => 1,
            
        ],
        [
            'name' => "Loa Bluetooth JBL Charge 5",
            'type_id' => 2,
            'description' => "Được gia cố kỳ công cho kết cấu gọn gàng, loa JBL có khả năng chịu va đập tốt, dịch chuyển dễ dàng nhờ trọng lượng chỉ 0.96 kg, bố trí vững vàng trên bàn, kệ, bãi cát, tảng đá ở nơi cắm trại với thiết kế chân đế có độ bám tối ưu. ",
            'image' => "bluetooth-jbl-charge-5-1-org.jpg",
            'price' => 399,
            'discount_id' => 4,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Bluetooth Sony SRS",
            'type_id' => 2,
            'description' => "Thiết kế loa Bluetooth Sony đơn giản, gọn nhẹ chỉ 0.4 kg, đi kèm dây treo cho bạn dễ dàng đeo vào cổ tay của mình hoặc treo móc vào balo mang theo khi đi chơi, du lịch, đi học,... Chất liệu vỏ nhựa có thêm lớp UV coating cho độ bền cao, chống trầy xước, làm sạch nhẹ nhàng.",
            'image' => "bluetooth-sony-srs-xb13-1-1-org.jpg",
            'price' => 116,
            'discount_id' => 1,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Microlab B26",
            'type_id' => 2,
            'description' => "Loa vi tính Microlab B26 có 2 chiếc loa nhỏ trọng lượng chỉ 0.5 kg, chất liệu nhựa tốt, màu đen trơn bóng đẹp, rất tiện lợi khi mang đi và đặt ở bất kỳ nơi nào bạn muốn. Sản phẩm vận hành liên tục nhờ nguồn điện trực tiếp, không lo hết pin trong quá trình sử dụng.",
            'image' => "vi-tinh-microlab-b26-den-2-1.jpg",
            'price' => 274,
            'discount_id' => 3,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Bluetooth Mozard S21",
            'type_id' => 2,
            'description' => "Màng loa căng mịn chắc chắn, lớp vỏ bọc cao su giữ loa chống trầy và chống trượt khi đặt trên các mặt phẳng trơn bóng. Với trọng lượng chỉ 275 g, thật nhẹ nhàng để bảo quản và mang theo sử dụng loa mọi lúc, mọi nơi.",
            'image' => "bluetooth-mozard-s21-xanh-1.jpg",
            'price' => 399,
            'discount_id' => 2,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Bluetooth JBL Partybox",
            'type_id' => 2,
            'description' => "Loa Bluetooth JBL Partybox 100 màu đen với thiết kế hình trụ khá mềm mại, vát cạnh tinh tế, tạo nét sang trọng cho tổng thể sản phẩm và không gian sử dụng.",
            'image' => "bluetooth-jbl-partybox-100-den-2-1.jpg",
            'price' => 95,
            'discount_id' => 3,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Laptop MSI Katana GF76",
            'type_id' => 3,
            'description' => "Khơi nguồn mọi cảm hứng game thủ với cấu hình mạnh mẽ đến từ con chip Intel thế hệ 11 tân tiến cùng lối thiết kế cơ động, chuẩn gaming, MSI Katana GF76 11UC i7 (441VN) hứa hẹn sẽ là một chiến binh dũng mãnh cùng bạn xông pha trên mọi thế trận.",
            'image' => "msi-katana-gf76-11uc-i7-441vn-3-1.jpg",
            'price' => 2799,
            'discount_id' => 2,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Laptop HP Gaming VICTUS 16",
            'type_id' => 3,
            'description' => "HP Gaming VICTUS 16 d0202TX i5 11400H (4R0U4PA) là phiên bản laptop gaming đầy mới mẻ với thiết kế thời thượng cùng cấu hình ổn định, sẵn sàng cùng bạn chinh phục mọi tác vụ công việc, giải trí.",
            'image' => "hp-gaming-victus-16-d0202tx-i5-4r0u4pa-3-1.jpg",
            'price' => 2899,
            'discount_id' => 4,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Laptop Asus TUF Gaming",
            'type_id' => 3,
            'description' => "Laptop Asus TUF Gaming FX506HC i5 (HN144W) với cấu hình mạnh mẽ, thiết kế độc đáo cùng khả năng chiến tốt các tựa game hiện hành là sự lựa chọn phù hợp cho bạn. ",
            'image' => "asus-tuf-gaming-fx506hc-i5-hn144w-3.jpg",
            'price' => 2399,
            'discount_id' => 4,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Laptop MSI Creator M16",
            'type_id' => 3,
            'description' => "Ngoại hình tinh tế thu hút mọi ánh nhìn cùng hiệu năng mạnh mẽ vượt bậc, MSI Creator M16 A12UC i7 12700H (292VN) là chiếc laptop CPU thế hệ 12 sẽ đáp ứng hoàn hảo mọi tác vụ đồ họa - kỹ thuật chuyên sâu của người dùng.",
            'image' => "msi-creator-m16-a12uc-i7-292vn-12-1020x570.jpg",
            'price' => 3649,
            'discount_id' => 2,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Laptop HP ZBook Firefly",
            'type_id' => 3,
            'description' => "ZBook Firefly 14 G8 i7 (275W0AV) là phiên bản laptop hoàn toàn mới đến từ nhà HP với ngoại hình mỏng nhẹ, đậm tính thời trang cùng hiệu năng mạnh mẽ vượt bậc, đáp ứng đầy đủ mọi nhu cầu cho người dùng từ văn phòng cơ bản đến các tác vụ đồ họa - kỹ thuật chuyên sâu.",
            'image' => "hp-zbook-firefly-14-g8-i7-275w0av-1.jpg",
            'price' => 4139,
            'discount_id' => 3,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Bluetooth Sony Extra",
            'type_id' => 2,
            'description' => "Loa Bluetooth Sony có kiểu dáng hiện đại, gọn đẹp, năng động. Kích cỡ hơi lớn nhưng bạn vẫn cầm nắm, di chuyển thoái mái đến mọi nơi nghe nhạc. Màu đen, xanh dương đẹp mắt, tinh tế, dễ lựa chọn. ",
            'image' => "loa-bluetooth-sony-srs-xb43-xanhduong-3-org.jpg",
            'price' => 399,
            'discount_id' => 2,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Kéo Bluetooth Mozard",
            'type_id' => 2,
            'description' => "Loa Kéo Bluetooth Mozard L0629K Đen Xám có thiết kế hình chữ nhật đứng được tạo điểm nhấn bởi các đường viền màu trắng đẹp mắt.",
            'image' => "loa-keo-bluetooth-mozard-l0629k-den-xam-091120-1103180.jpg",
            'price' => 132,
            'discount_id' => 3,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Bluetooth JBL GO2",
            'type_id' => 2,
            'description' => "Loa Bluetooth JBL GO2 có thiết kế trẻ trung, màu sắc bắt mắt, đi cùng kích thước nhỏ gọn, nhẹ nhàng, tính di động cao là một phụ kiện thích hợp để khuấy động các buổi tiệc",
            'image' => "loa-bluetooth-jbl-go2blk-den-do-up-1-org.jpg",
            'price' => 690,
            'discount_id' => 2,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Loa Bluetooth MozardX",
            'type_id' => 2,
            'description' => "Loa Bluetooth MozardX BM01 đen có thiết kế năng động, trẻ trung, với quai cầm tiện ích, dễ dàng mang theo khi đi du lịch, cắm trại",
            'image' => "loa-bluetooth-mozardx-bm01-den-up-1-org.jpg",
            'price' => 977,
            'discount_id' => 2,
            
            'feature' => 1,
            
        ],
        [
            'name' => "Loa Bluetooth iCutes MB",
            'type_id' => 2,
            'description' => "Kiểu dáng của loa gọn gàng, vỏ cao su hạn chế trầy xước khi bỏ vào ba lô mang đi.",
            'image' => "loa-bluetooth-icutes-mb-m916-cu-den-1-org.jpg",
            'price' => 212,
            'discount_id' => 2,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Webcam 720P Logitech",
            'type_id' => 1,
            'description' => "Webcam thực hiện ghi hình với chất lượng video 720p tốc độ khung hình 30 fps cho hình ảnh sắc nét, có góc quay chéo 60°.Thiết bị này hỗ trợ tính năng RightLight 2 cho khả năng tự động điều chỉnh ánh sáng theo môi trường, cho ra hình ảnh có độ tương phản cao, tươi sáng đáp ứng hình ảnh đẹp trong các cuộc gọi video.",
            'image' => "webcam-720p-logitech-c310-den-2-1.jpg",
            'price' => 699,
            'discount_id' => 1,
            
            'feature' => 1,
            
        ],
        [
            'name' => "Webcam 1080P A4Tech",
            'type_id' => 1,
            'description' => "Tích hợp lớp chống chói trên bề mặt ống kính giúp hạn chế tối đa tình trạng phản chiếu ánh sáng, hơn nữa với tốc độ quét hình ảnh 30 hình/giây, khả năng ghi hình trong điều kiện thiếu sáng cùng với tính năng Intelligent Multisampling cung cấp video mượt mà, rõ đẹp, màu sắc tươi tắn ấn tượng.",
            'image' => "webcam-1080p-a4tech-pk-920h-den-2.jpg",
            'price' => 640,
            'discount_id' => 1,
            
            'feature' => 0,
            
        ],
        [
            'name' => "Webcam 480P A4Tech",
            'type_id' => 1,
            'description' => "Webcam được chế tác đơn giản, chỉ nặng 206 gram, chân đế thiết kế với họa tiết độc lạ, kích cỡ lớn, đặt vững vàng ở bất kỳ nơi nào bạn muốn, rất dễ di động. Bề mặt phủ gam màu bạc kết hợp màu đen thanh lịch, tạo điểm nhấn sang trọng cho không gian nội thất.",
            'image' => "webcam-480p-a4tech-pk-635g-bac-2.jpg",
            'price' => 360,
            'discount_id' => 1,
            'feature' => 1,
            
        ],
        [
            'name' => "Webcam 1080P Rapoo",
            'type_id' => 1,
            'description' => "Webcam Rapoo có cụm camera hình chữ nhật với các cạnh uốn cong, trọng lượng 97.5 g cùng thiết kế chân đế cho khả năng xoay và lắp đặt linh hoạt, giúp sử dụng thuận tiện ở nhiều địa điểm khác nhau. ",
            'image' => "webcam-1080p-rapoo-c260-2-2-org.jpg",
            'price' => 639,
            'discount_id' => 1,
            'feature' => 1,
            
        ],

    ],
    );
    }
}
