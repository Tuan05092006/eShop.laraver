"""
╔══════════════════════════════════════════════════════════╗
║  VELOX AUTO - Script Phân Tích Dữ Liệu                 ║
║  Sử dụng: Python + Pandas + Matplotlib + Seaborn        ║
║  Mục đích: Phân tích độ tuổi khách hàng                 ║
║            và sản phẩm bán chạy/ít nhất                 ║
╚══════════════════════════════════════════════════════════╝

Hướng dẫn sử dụng:
1. Cài đặt thư viện: pip install -r requirements.txt
2. Cập nhật thông tin kết nối DB bên dưới
3. Chạy: python analytics.py
4. Kết quả sẽ được lưu vào thư mục output/
"""

import os
import sys
from datetime import datetime, date

import pandas as pd
import matplotlib
matplotlib.use('Agg')  # Non-interactive backend
import matplotlib.pyplot as plt
import matplotlib.ticker as mticker
import seaborn as sns

# ═══════════════════════════════════════════════════════════
# CẤU HÌNH KẾT NỐI CƠ SỞ DỮ LIỆU
# ═══════════════════════════════════════════════════════════
DB_CONFIG = {
    'host': 'viaduct.proxy.rlwy.net',   # Railway Public Host
    'port': 3905,                         # Railway Public Port
    'user': 'root',
    'password': 'JbnVTwFDstDClUOgCiAlVKTdmLitDVSjc',
    'database': 'railway',
}

# Thư mục xuất kết quả
OUTPUT_DIR = os.path.join(os.path.dirname(__file__), 'output')
os.makedirs(OUTPUT_DIR, exist_ok=True)

# Cấu hình style chung cho biểu đồ (Dark Theme)
plt.style.use('dark_background')
sns.set_palette("bright")
COLORS = {
    'primary': '#2962ff',
    'primary_light': '#b6c4ff',
    'surface': '#1e1e1e',
    'background': '#111111',
    'text': '#e5e2e1',
    'text_muted': '#9ca3af',
    'green': '#34d399',
    'red': '#f87171',
    'yellow': '#fbbf24',
    'purple': '#a78bfa',
    'orange': '#fb923c',
    'cyan': '#2dd4bf',
}
AGE_COLORS = [COLORS['green'], COLORS['primary_light'], COLORS['purple'], COLORS['yellow'], COLORS['red']]


def get_db_connection():
    """Kết nối cơ sở dữ liệu MySQL."""
    try:
        import mysql.connector
        conn = mysql.connector.connect(**DB_CONFIG)
        print("✅ Kết nối MySQL thành công!")
        return conn
    except ImportError:
        print("❌ Lỗi: Chưa cài đặt mysql-connector-python")
        print("   Chạy: pip install mysql-connector-python")
        sys.exit(1)
    except Exception as e:
        print(f"❌ Lỗi kết nối MySQL: {e}")
        sys.exit(1)


# ═══════════════════════════════════════════════════════════
# 1. PHÂN TÍCH ĐỘ TUỔI KHÁCH HÀNG
# ═══════════════════════════════════════════════════════════

def analyze_customer_age(conn):
    """Phân tích độ tuổi khách hàng từ cơ sở dữ liệu."""
    print("\n" + "="*60)
    print("📊 PHÂN TÍCH ĐỘ TUỔI KHÁCH HÀNG")
    print("="*60)

    # Lấy dữ liệu users
    query = """
        SELECT id, name, email, date_of_birth
        FROM users
        WHERE date_of_birth IS NOT NULL
    """
    df = pd.read_sql(query, conn)

    if df.empty:
        print("⚠️  Không có dữ liệu ngày sinh. Hãy đăng ký tài khoản với ngày sinh.")
        return None

    # Tính tuổi
    today = date.today()
    df['date_of_birth'] = pd.to_datetime(df['date_of_birth'])
    df['age'] = df['date_of_birth'].apply(
        lambda dob: today.year - dob.year - ((today.month, today.day) < (dob.month, dob.day))
    )

    # Phân nhóm tuổi
    bins = [0, 25, 35, 45, 55, 120]
    labels = ['18-25', '26-35', '36-45', '46-55', '55+']
    df['age_group'] = pd.cut(df['age'], bins=bins, labels=labels, right=True)

    # Thống kê tóm tắt
    print(f"\n📋 Tổng số khách hàng có dữ liệu tuổi: {len(df)}")
    print(f"   Tuổi trung bình: {df['age'].mean():.1f}")
    print(f"   Tuổi nhỏ nhất:   {df['age'].min()}")
    print(f"   Tuổi lớn nhất:   {df['age'].max()}")
    print(f"   Độ lệch chuẩn:   {df['age'].std():.1f}")

    print("\n📊 Phân bổ theo nhóm tuổi:")
    age_dist = df['age_group'].value_counts().sort_index()
    for group, count in age_dist.items():
        pct = count / len(df) * 100
        bar = "█" * int(pct / 2)
        print(f"   {group:>8}: {count:>4} ({pct:>5.1f}%) {bar}")

    # ── Biểu đồ 1: Histogram phân bổ tuổi ──
    fig, ax = plt.subplots(figsize=(10, 6), facecolor=COLORS['background'])
    ax.set_facecolor(COLORS['surface'])

    ax.hist(df['age'], bins=range(15, 75, 5), color=COLORS['primary'],
            edgecolor=COLORS['background'], alpha=0.85, rwidth=0.85)

    ax.set_xlabel('Tuổi', fontsize=12, color=COLORS['text'], fontweight='bold')
    ax.set_ylabel('Số lượng khách hàng', fontsize=12, color=COLORS['text'], fontweight='bold')
    ax.set_title('PHÂN BỔ ĐỘ TUỔI KHÁCH HÀNG VELOX AUTO',
                 fontsize=16, color=COLORS['text'], fontweight='black', pad=20)
    ax.tick_params(colors=COLORS['text_muted'])

    # Thêm thống kê
    stats_text = f"TB: {df['age'].mean():.1f} | Min: {df['age'].min()} | Max: {df['age'].max()}"
    ax.text(0.98, 0.95, stats_text, transform=ax.transAxes, fontsize=9,
            color=COLORS['primary_light'], ha='right', va='top',
            bbox=dict(boxstyle='round,pad=0.5', facecolor=COLORS['surface'], edgecolor=COLORS['primary'], alpha=0.8))

    plt.tight_layout()
    path1 = os.path.join(OUTPUT_DIR, 'age_distribution.png')
    plt.savefig(path1, dpi=150, bbox_inches='tight')
    plt.close()
    print(f"\n✅ Đã lưu biểu đồ: {path1}")

    # ── Biểu đồ 2: Pie Chart nhóm tuổi ──
    fig, ax = plt.subplots(figsize=(8, 8), facecolor=COLORS['background'])

    age_counts = df['age_group'].value_counts().sort_index()
    wedges, texts, autotexts = ax.pie(
        age_counts.values, labels=age_counts.index,
        colors=AGE_COLORS[:len(age_counts)],
        autopct='%1.1f%%', startangle=90, pctdistance=0.75,
        wedgeprops=dict(width=0.45, edgecolor=COLORS['background'], linewidth=3),
    )

    for text in texts:
        text.set_color(COLORS['text'])
        text.set_fontsize(12)
        text.set_fontweight('bold')
    for autotext in autotexts:
        autotext.set_color(COLORS['background'])
        autotext.set_fontsize(10)
        autotext.set_fontweight('bold')

    ax.set_title('PHÂN BỔ NHÓM TUỔI KHÁCH HÀNG',
                 fontsize=16, color=COLORS['text'], fontweight='black', pad=30)

    plt.tight_layout()
    path2 = os.path.join(OUTPUT_DIR, 'age_pie_chart.png')
    plt.savefig(path2, dpi=150, bbox_inches='tight')
    plt.close()
    print(f"✅ Đã lưu biểu đồ: {path2}")

    # Xuất CSV
    csv_path = os.path.join(OUTPUT_DIR, 'customer_ages.csv')
    df[['id', 'name', 'email', 'date_of_birth', 'age', 'age_group']].to_csv(csv_path, index=False, encoding='utf-8-sig')
    print(f"✅ Đã xuất CSV: {csv_path}")

    return df


# ═══════════════════════════════════════════════════════════
# 2. PHÂN TÍCH SẢN PHẨM BÁN CHẠY / ÍT NHẤT
# ═══════════════════════════════════════════════════════════

def analyze_product_sales(conn):
    """Phân tích sản phẩm bán chạy nhất và ít nhất."""
    print("\n" + "="*60)
    print("📊 PHÂN TÍCH SẢN PHẨM BÁN CHẠY / ÍT NHẤT")
    print("="*60)

    query = """
        SELECT
            p.id,
            p.name AS product_name,
            c.name AS brand_name,
            p.price AS unit_price,
            COALESCE(SUM(od.quantity), 0) AS total_quantity,
            COALESCE(SUM(od.price * od.quantity), 0) AS total_revenue
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.id
        LEFT JOIN order_details od ON p.id = od.product_id
        GROUP BY p.id, p.name, c.name, p.price
        ORDER BY total_quantity DESC
    """
    df = pd.read_sql(query, conn)

    if df.empty:
        print("⚠️  Không có dữ liệu sản phẩm.")
        return None

    # Thống kê tóm tắt
    sold_products = df[df['total_quantity'] > 0]
    print(f"\n📋 Tổng sản phẩm: {len(df)}")
    print(f"   Đã bán: {len(sold_products)} | Chưa bán: {len(df) - len(sold_products)}")
    print(f"   Tổng doanh thu: {df['total_revenue'].sum():,.0f} VND")
    print(f"   Tổng số lượng bán: {df['total_quantity'].sum():,.0f}")

    # Top 10 bán chạy
    top10 = df.head(10)
    print(f"\n🏆 TOP 10 SẢN PHẨM BÁN CHẠY NHẤT:")
    print("-" * 70)
    for i, row in top10.iterrows():
        print(f"   #{i+1:>2} | {row['product_name']:<25} | {row['brand_name']:<15} | SL: {row['total_quantity']:>5} | DT: {row['total_revenue']:>15,.0f} VND")

    # Bottom 5 bán ít nhất (có bán)
    bottom5 = sold_products.tail(5) if len(sold_products) >= 5 else sold_products
    print(f"\n📉 TOP 5 SẢN PHẨM BÁN ÍT NHẤT (đã bán):")
    print("-" * 70)
    for i, (_, row) in enumerate(bottom5.iterrows()):
        print(f"   #{i+1:>2} | {row['product_name']:<25} | {row['brand_name']:<15} | SL: {row['total_quantity']:>5} | DT: {row['total_revenue']:>15,.0f} VND")

    # ── Biểu đồ 1: Top 10 bán chạy (Horizontal Bar) ──
    fig, ax = plt.subplots(figsize=(12, 7), facecolor=COLORS['background'])
    ax.set_facecolor(COLORS['surface'])

    colors_bar = [COLORS['yellow'] if i == 0 else
                  COLORS['text_muted'] if i == 1 else
                  COLORS['orange'] if i == 2 else
                  COLORS['primary_light'] for i in range(len(top10))]

    y_pos = range(len(top10) - 1, -1, -1)
    bars = ax.barh(y_pos, top10['total_quantity'].values,
                   color=colors_bar[::-1], edgecolor='none', height=0.6)

    ax.set_yticks(y_pos)
    ax.set_yticklabels(top10['product_name'].values[::-1], fontsize=10,
                       color=COLORS['text'], fontweight='bold')

    for bar, qty in zip(bars, top10['total_quantity'].values[::-1]):
        ax.text(bar.get_width() + 0.3, bar.get_y() + bar.get_height()/2,
                f'{int(qty)}', va='center', fontsize=10, color=COLORS['text'],
                fontweight='bold')

    ax.set_xlabel('Số lượng bán', fontsize=12, color=COLORS['text'], fontweight='bold')
    ax.set_title('TOP 10 SẢN PHẨM BÁN CHẠY NHẤT - VELOX AUTO',
                 fontsize=16, color=COLORS['text'], fontweight='black', pad=20)
    ax.tick_params(colors=COLORS['text_muted'])
    ax.spines['top'].set_visible(False)
    ax.spines['right'].set_visible(False)

    plt.tight_layout()
    path1 = os.path.join(OUTPUT_DIR, 'top_products.png')
    plt.savefig(path1, dpi=150, bbox_inches='tight')
    plt.close()
    print(f"\n✅ Đã lưu biểu đồ: {path1}")

    # ── Biểu đồ 2: Doanh thu theo thương hiệu ──
    brand_df = df.groupby('brand_name').agg(
        total_revenue=('total_revenue', 'sum'),
        total_quantity=('total_quantity', 'sum'),
        product_count=('id', 'count'),
    ).sort_values('total_revenue', ascending=False).reset_index()

    fig, ax = plt.subplots(figsize=(12, 7), facecolor=COLORS['background'])
    ax.set_facecolor(COLORS['surface'])

    brand_colors = [COLORS['primary'], COLORS['primary_light'], COLORS['purple'],
                    COLORS['green'], COLORS['yellow'], COLORS['red'],
                    COLORS['cyan'], COLORS['orange']]

    bars = ax.bar(range(len(brand_df)), brand_df['total_revenue'].values,
                  color=[brand_colors[i % len(brand_colors)] for i in range(len(brand_df))],
                  edgecolor='none', width=0.6)

    ax.set_xticks(range(len(brand_df)))
    ax.set_xticklabels(brand_df['brand_name'].values, fontsize=9,
                       color=COLORS['text'], fontweight='bold', rotation=30, ha='right')

    ax.yaxis.set_major_formatter(mticker.FuncFormatter(
        lambda x, _: f'{x/1e9:.1f} tỷ' if x >= 1e9 else f'{x/1e6:.0f} tr'
    ))

    ax.set_ylabel('Doanh thu (VND)', fontsize=12, color=COLORS['text'], fontweight='bold')
    ax.set_title('DOANH THU THEO THƯƠNG HIỆU - VELOX AUTO',
                 fontsize=16, color=COLORS['text'], fontweight='black', pad=20)
    ax.tick_params(colors=COLORS['text_muted'])
    ax.spines['top'].set_visible(False)
    ax.spines['right'].set_visible(False)

    plt.tight_layout()
    path2 = os.path.join(OUTPUT_DIR, 'brand_revenue.png')
    plt.savefig(path2, dpi=150, bbox_inches='tight')
    plt.close()
    print(f"✅ Đã lưu biểu đồ: {path2}")

    # ── Biểu đồ 3: Bottom 5 bán ít nhất ──
    if len(bottom5) > 0:
        fig, ax = plt.subplots(figsize=(10, 5), facecolor=COLORS['background'])
        ax.set_facecolor(COLORS['surface'])

        ax.barh(range(len(bottom5)), bottom5['total_quantity'].values,
                color=COLORS['red'], edgecolor='none', height=0.5, alpha=0.8)

        ax.set_yticks(range(len(bottom5)))
        ax.set_yticklabels(bottom5['product_name'].values, fontsize=10,
                           color=COLORS['text'], fontweight='bold')

        ax.set_xlabel('Số lượng bán', fontsize=12, color=COLORS['text'], fontweight='bold')
        ax.set_title('TOP 5 SẢN PHẨM BÁN ÍT NHẤT - VELOX AUTO',
                     fontsize=14, color=COLORS['red'], fontweight='black', pad=20)
        ax.tick_params(colors=COLORS['text_muted'])

        plt.tight_layout()
        path3 = os.path.join(OUTPUT_DIR, 'bottom_products.png')
        plt.savefig(path3, dpi=150, bbox_inches='tight')
        plt.close()
        print(f"✅ Đã lưu biểu đồ: {path3}")

    # Xuất CSV
    csv_path = os.path.join(OUTPUT_DIR, 'product_sales.csv')
    df.to_csv(csv_path, index=False, encoding='utf-8-sig')
    print(f"✅ Đã xuất CSV: {csv_path}")

    csv_brand = os.path.join(OUTPUT_DIR, 'brand_revenue.csv')
    brand_df.to_csv(csv_brand, index=False, encoding='utf-8-sig')
    print(f"✅ Đã xuất CSV: {csv_brand}")

    return df


# ═══════════════════════════════════════════════════════════
# MAIN
# ═══════════════════════════════════════════════════════════

def main():
    print("╔══════════════════════════════════════════════════════════╗")
    print("║  VELOX AUTO - Công Cụ Phân Tích Dữ Liệu               ║")
    print("║  Version: 1.0                                          ║")
    print(f"║  Thời gian: {datetime.now().strftime('%d/%m/%Y %H:%M:%S'):<43}║")
    print("╚══════════════════════════════════════════════════════════╝")

    conn = get_db_connection()

    try:
        # 1. Phân tích độ tuổi khách hàng
        age_df = analyze_customer_age(conn)

        # 2. Phân tích sản phẩm bán chạy / ít nhất
        sales_df = analyze_product_sales(conn)

        print("\n" + "="*60)
        print("✅ HOÀN TẤT PHÂN TÍCH DỮ LIỆU!")
        print(f"   📁 Kết quả được lưu tại: {OUTPUT_DIR}")
        print("   📊 Các file đã tạo:")
        for f in os.listdir(OUTPUT_DIR):
            size = os.path.getsize(os.path.join(OUTPUT_DIR, f))
            print(f"      - {f} ({size/1024:.1f} KB)")
        print("="*60)

    finally:
        conn.close()
        print("\n🔌 Đã ngắt kết nối MySQL.")


if __name__ == '__main__':
    main()
