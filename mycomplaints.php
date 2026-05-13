<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Complaints - ADGIPS Facility Central</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      color-scheme: light;
      font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      color: #1f2937;
      background: #f5f7fb;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      min-height: 100vh;
      background: #eef2f9;
    }
    form{
  width: 800px;   /* increase as needed */
}
    .app {
      display: grid;
      grid-template-columns: 280px minmax(0, 1fr);
      min-height: 100vh;
    }

    .sidebar {
      padding: 32px 24px;
      display: flex;
      flex-direction: column;
      gap: 30px;
      background: #ffffff;
      border-right: 1px solid #e5e7eb;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .brand-icon {
      width: 44px;
      height: 44px;
      border-radius: 14px;
      background: radial-gradient(circle at top left, #2563eb 0%, #1d4ed8 100%);
      display: grid;
      place-items: center;
      color: #fff;
      font-weight: 700;
      font-size: 1.1rem;
    }

    .brand-name {
      font-size: 1rem;
      font-weight: 700;
      letter-spacing: -0.02em;
    }

    .brand-subtitle {
      color: #6b7280;
      font-size: 0.83rem;
      margin-top: 4px;
    }

    .nav {
      display: grid;
      gap: 10px;
    }

    .nav a {
      display: block;
      text-decoration: none;
      color: #374151;
      padding: 14px 18px;
      border-radius: 16px;
      transition: background 0.2s ease;
      font-size: 0.95rem;
      font-weight: 500;
    }

    .nav a.active,
    .nav a:hover {
      background: #e8eeff;
      color: #1d4ed8;
    }

    .performance-card {
      background: #0f172a;
      color: #f8fafc;
      border-radius: 26px;
      padding: 24px;
      display: grid;
      gap: 14px;
      box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
    }

    .performance-card strong {
      display: block;
      font-size: 0.82rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: #93c5fd;
    }

    .performance-card p {
      margin: 0;
      color: #dbeafe;
      line-height: 1.7;
      font-size: 0.94rem;
    }

    .profile {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding-top: 10px;
    }

    .profile-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      background: linear-gradient(145deg, #2563eb, #1d4ed8);
      color: #fff;
      font-weight: 700;
    }

    .profile-text {
      font-size: 0.95rem;
      line-height: 1.2;
    }

    .profile-text span {
      display: block;
      color: #94a3b8;
      font-size: 0.82rem;
    }

    .main {
      padding: 32px;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .topbar {
      display: flex;
      align-items: center;
      gap: 20px;
      justify-content: space-between;
      margin-bottom: 16px;
    }

    .heading-group {
      display: grid;
      gap: 4px;
    }

    .heading-group h1 {
      margin: 0;
      font-size: 1.75rem;
      letter-spacing: -0.02em;
    }

    .heading-group p {
      margin: 0;
      color: #6b7280;
      font-size: 0.95rem;
    }

    .top-actions {
      display: flex;
      align-items: center;
      gap: 18px;
       justify-content: space-between;
    }

    .search {
      position: relative;
      display: inline-flex;
      align-items: center;
      width: 260px;
    }

    .search input {
      width: 100%;
      border: 1px solid #d1d5db;
      border-radius: 999px;
      padding: 12px 16px 12px 42px;
      font-size: 0.95rem;
      color: #111827;
      background: #f8fafc;
    }

    .search-icon {
      position: absolute;
      left: 16px;
      color: #9ca3af;
      font-size: 1rem;
    }

    .user-badge {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      margin: 0 14px;
      background: #e2e8f0;
      display: grid;
      place-items: center;
      color: #1f2937;
      font-weight: 700;
    }

    .controls-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 20px;
    }

    .search-bar {
      flex: 1;
      position: relative;
      display: inline-flex;
      align-items: center;
    }

    .search-bar input {
      width: 100%;
      border: 1px solid #e5e7eb;
      border-radius: 999px;
      padding: 14px 16px 14px 42px;
      font-size: 0.95rem;
      color: #111827;
      background: #ffffff;
    }

    .search-bar input::placeholder {
      color: #a8b3c1;
    }

    .search-bar-icon {
      position: absolute;
      left: 16px;
      color: #9ca3af;
      font-size: 1.05rem;
    }

    .filter-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 16px;
      border: 1px solid #d1d5db;
      border-radius: 12px;
      background: #ffffff;
      color: #1f2937;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      font-size: 0.95rem;
    }

    .filter-btn:hover {
      border-color: #2563eb;
      color: #2563eb;
    }

    .complaints-list {
      display: grid;
      gap: 16px;
    }

    .complaint-card {
      background: #ffffff;
      border: 1px solid #e5e7eb;
      border-radius: 18px;
      padding: 24px;
      display: flex;
      gap: 20px;
      align-items: flex-start;
      transition: all 0.2s ease;
      box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
    }

    .complaint-card:hover {
      border-color: #d1d5db;
      box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
    }

    .complaint-icon {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      font-size: 1.8rem;
      flex-shrink: 0;
    }

    .complaint-icon.pending {
      background: #fed7aa;
      color: #d97706;
    }

    .complaint-icon.info {
      background: #dbeafe;
      color: #0284c7;
    }

    .complaint-content {
      flex: 1;
      min-width: 0;
    }

    .complaint-title {
      font-size: 1rem;
      font-weight: 600;
      color: #111827;
      margin: 0 0 12px 0;
      line-height: 1.4;
      word-break: break-word;
    }

    .complaint-meta {
      display: flex;
      align-items: center;
      gap: 16px;
      flex-wrap: wrap;
      margin-bottom: 8px;
    }

    .complaint-id {
      color: #a8b3c1;
      font-size: 0.88rem;
      font-weight: 500;
    }

    .priority-badge {
      display: inline-flex;
      align-items: center;
      padding: 6px 10px;
      border-radius: 6px;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }

    .priority-high {
      background: #fee2e2;
      color: #b91c1c;
    }

    .priority-medium {
      background: #fef3c7;
      color: #92400e;
    }

    .priority-low {
      background: #dcfce7;
      color: #166534;
    }

    .complaint-details {
      display: flex;
      align-items: center;
      gap: 16px;
      font-size: 0.88rem;
      color: #475569;
      flex-wrap: wrap;
    }

    .detail-item {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .detail-icon {
      font-size: 1rem;
      opacity: 0.7;
    }

    .complaint-actions {
      display: flex;
      align-items: center;
      gap: 12px;
      flex-shrink: 0;
    }

    .action-btn {
      padding: 10px 16px;
      border-radius: 8px;
      border: none;
      font-weight: 700;
      font-size: 0.8rem;
      letter-spacing: 0.05em;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-assign {
      background: transparent;
      color: #2563eb;
      border: 1px solid #2563eb;
    }

    .btn-assign:hover {
      background: #eff6ff;
    }

    .btn-resolve {
      background: #2563eb;
      color: #ffffff;
    }

    .btn-resolve:hover {
      background: #1d4ed8;
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: #a8b3c1;
    }

    .empty-state-icon {
      font-size: 4rem;
      margin-bottom: 16px;
    }

    .empty-state-text {
      font-size: 1rem;
      margin: 0;
    }

    .floating-chat {
      position: fixed;
      bottom: 32px;
      right: 32px;
      width: 62px;
      height: 62px;
      border-radius: 18px;
      background: #2563eb;
      display: grid;
      place-items: center;
      color: #fff;
      box-shadow: 0 18px 30px rgba(37, 99, 235, 0.35);
      cursor: pointer;
      font-size: 1.5rem;
      z-index: 10;
    }

    @media (max-width: 1200px) {
      .complaint-card {
        flex-direction: column;
      }

      .complaint-actions {
        justify-content: flex-start;
        width: 100%;
      }
    }

    @media (max-width: 820px) {
      .app {
        grid-template-columns: 1fr;
      }

      .sidebar {
        border-right: none;
        border-bottom: 1px solid #e5e7eb;
      }

      .topbar {
        flex-direction: column;
        align-items: stretch;
      }

      .search {
        width: 100%;
      }

      .controls-bar {
        flex-direction: column;
      }

      .search-bar {
        width: 100%;
      }

      .complaint-details {
        flex-direction: column;
        align-items: flex-start;
      }
    }
    body {
  font-family: 'Segoe UI', sans-serif;
  background: #eef2f9;
  margin: 0;
}

.container {
  padding: 40px;
  max-width: 900px;
  margin: auto;
}

h2 {
  margin-bottom: 25px;
  color: #1f2937;
}

.complaint-card {
  height: auto;       /* allow height to grow */
  overflow: hidden;   /* prevent overflow issues */
}

.complaint-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(0,0,0,0.1);
}

.complaint-card h3 {
  margin: 0 0 12px 0;
  font-size: 18px;
  color: #111827;
  width: 40%;
  /* IMPORTANT FIXES */
  word-wrap: break-word;        /* break long words */
  overflow-wrap: break-word;    /* modern version */
  white-space: normal;          /* allow multiple lines */
  line-height: 1.5;             /* better readability */
}

.complaint-card p {
  margin: 6px 0;
  font-size: 14px;
  color: #4b5563;
}

strong {
  color: #1f2937;
}

/* Priority badge */
.priority {
  display: inline-block;
  padding: 5px 10px;
  border-radius: 6px;
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
}

/* Colors */
.high {
  background: #fee2e2;
  color: #b91c1c;
}

.medium {
  background: #fef3c7;
  color: #92400e;
}

.low {
  background: #dcfce7;
  color: #166534;
}

/* Header row */
.meta-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 8px;
}

/* ID styling */
.id {
  font-size: 12px;
  color: #9ca3af;
}

/* Room + category row */
.details {
  display: flex;
  gap: 20px;
  margin-top: 10px;
  font-size: 13px;
}
.actions {
  display: flex;
  gap: 10px;
  margin-top: 15px;
}

.btn-assign {
  background: #2563eb;
  color: white;
  padding: 8px 14px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 13px;
}

.btn-delete {
  background: #dc2626;
  color: white;
  padding: 8px 14px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 13px;
}

.btn-assign:hover {
  background: #1d4ed8;
}

.btn-delete:hover {
  background: #b91c1c;
}
  </style>
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-icon">AD</div>
        <div>
          <div class="brand-name">ADGIPS</div>
        </div>
      </div>

     <nav class="space-y-3 text-slate-700">
            <a href="index.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">Dashboard</a>
            <a href="mycomplaints.php" class="block rounded-2xl px-4 py-3 bg-slate-100 text-blue-700 font-semibold">My Complaints</a>
            <a href="filecomplaint.html" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">File Complaint</a>
            <a href="assessmentmanagement.html" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">Asset Management</a>
            <a href="aiassistant.html" class="block rounded-2xl px-4 py-3 hover:bg-slate-100">AI Assistant</a>
          </nav>

      <div class="performance-card">
        <strong>AI PERFORMANCE</strong>
        <p>AI accurately categorized 94% of issues last month. Resource allocation optimized by 12%.</p>
        <div class="profile">
          <div class="profile-info">
            <div class="avatar">AS</div>
            <div class="profile-text">
              <strong>Ayush.</strong>
              <span>Admin Access</span>
            </div>
          </div>
          <div>→</div>
        </div>
      </div>
    </aside>

    <main class="main">
      <section class="topbar">
        <div class="heading-group">
          <h1>ADGIPS Facility Central</h1>
          <p>Monitoring 1,240 rooms · Block A-D</p>
        </div>
        <div class="top-actions">
          <div class="user-badge">AD</div>
        </div>
      </section>

      <div class="controls-bar">
        <label class="search-bar">
          <span class="search-bar-icon">🔍</span>
          <form method="GET">
             <input type="search" name="search" placeholder="Search complaints....." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
          </form>
        </label>
        <button class="filter-btn">
          <span>⚙️</span> Filters
        </button>
      </div>

   <?php include 'db.php'; ?>

<section class="complaints-list">

<?php
$search = "";

if (isset($_GET['search'])) {
  $search = $conn->real_escape_string($_GET['search']);
  $sql = "SELECT * FROM complaints 
          WHERE complaint LIKE '%$search%' 
          OR room LIKE '%$search%' 
          OR category LIKE '%$search%' 
          OR block LIKE '%$search%'
          ORDER BY id DESC";
} else {
  $sql = "SELECT * FROM complaints ORDER BY id DESC";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

    $priority = strtolower($row['priority']);

echo "
<div class='complaint-card'>

  <div class='meta-row'>
    <span class='id'>#CM-{$row['id']}</span>
    <br> <br>
    <span class='priority $priority'>{$row['priority']}</span>
  </div>

  <h3>{$row['complaint']}</h3>

  <div class='details'>
    <span>📍 Room {$row['room']}</span>
    <span>🏢 {$row['block']}</span>
     <span class='status'>{$row['status']}</span>
  </div>

  <p style='margin-top:10px; font-size:12px; color:#9ca3af;'>
    {$row['created_at']}
  </p>
 
  <!-- ACTION BUTTONS -->
  <div class='actions'>
   <a href='assign.php?id={$row['id']}' class='btn-assign'>Assign</a>
   <a href='delete.php?id={$row['id']}' class='btn-delete'>Remove</a>
  </div>

</div>
";
  }

} else {
  echo "<p>No complaints found</p>";
}
?>



</section>
    </main>
  </div>

  <div class="floating-chat">💬</div>

  <script>
    const navLinks = document.querySelectorAll('.nav a');
    const searchInput = document.querySelector('.search-bar input');
    const complaintsList = document.querySelector('.complaints-list');
    const floatingChat = document.querySelector('.floating-chat');
    const filterButton = document.querySelector('.filter-btn');

    // const defaultComplaints = [
    //   {
    //     id: '#CM-001',
    //     title: 'Leaking faucet in the bathroom causing water accumulation.',
    //     room: '401',
    //     category: 'PLUMBING',
    //     priority: 'HIGH',
    //     icon: '⏱️',
    //     iconType: 'pending'
    //   },
    //   {
    //     id: '#CM-002',
    //     title: 'The ceiling fan is making a grinding noise and running slow.',
    //     room: '215',
    //     category: 'ELECTRICAL',
    //     priority: 'MEDIUM',
    //     icon: 'ℹ️',
    //     iconType: 'info'
    //   }
    // ];

    function setActiveNav() {
      const currentPage = window.location.pathname.split('/').pop() || 'mycomplaints.html';
      navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPage) {
          link.classList.add('active');
        } else {
          link.classList.remove('active');
        }
      });
    }

    function createComplaintCard(complaint) {
      const card = document.createElement('article');
      card.className = 'complaint-card';
      card.innerHTML = `
        <div class="complaint-icon ${complaint.iconType}">${complaint.icon}</div>
        <div class="complaint-content">
          <h2 class="complaint-title">${complaint.title}</h2>
          <div class="complaint-meta">
            <span class="complaint-id">ID: ${complaint.id}</span>
            <span class="priority-badge priority-${complaint.priority.toLowerCase()}">${complaint.priority}</span>
          </div>
          <div class="complaint-details">
            <div class="detail-item"><span class="detail-icon">📍</span><span>ROOM ${complaint.room}</span></div>
            <div class="detail-item"><span class="detail-icon">🔧</span><span>${complaint.category}</span></div>
          </div>
        </div>
        <div class="complaint-actions">
          <button class="action-btn btn-assign">ASSIGN</button>
          <button class="action-btn btn-resolve">RESOLVE</button>
        </div>
      `;

      card.querySelector('.btn-assign').addEventListener('click', () => {
        alert(`Assigning complaint ${complaint.id}.`);
      });
      card.querySelector('.btn-resolve').addEventListener('click', () => {
        alert(`Resolving complaint ${complaint.id}.`);
      });
      return card;
    }

    // function loadStoredComplaints() {
    //   const stored = localStorage.getItem('hostelComplaints');
    //   if (!stored) return defaultComplaints;
    //   try {
    //     const saved = JSON.parse(stored);
    //     return Array.isArray(saved) && saved.length > 0 ? saved.map(entry => ({
    //       id: entry.id || `#CM-${Math.floor(Math.random() * 9000) + 1000}`,
    //       title: entry.description || 'No description provided.',
    //       room: entry.room || 'Unknown',
    //       category: (entry.category || 'GENERAL').toUpperCase(),
    //       priority: (entry.priority || 'MEDIUM').toUpperCase(),
    //       icon: (entry.priority || 'MEDIUM').toUpperCase() === 'HIGH' ? '⚠️' : 'ℹ️',
    //       iconType: (entry.priority || 'MEDIUM').toUpperCase() === 'HIGH' ? 'pending' : 'info'
    //     })) : defaultComplaints;
    //   } catch {
    //     return defaultComplaints;
    //   }
    // }

    function renderComplaints(complaints) {
      complaintsList.innerHTML = '';
      if (!complaints.length) {
        complaintsList.innerHTML = `
          <div class="empty-state">
            <div class="empty-state-icon">📭</div>
            <p class="empty-state-text">No complaints found. Create one from File Complaint.</p>
          </div>
        `;
        return;
      }
      complaints.forEach(complaint => complaintsList.appendChild(createComplaintCard(complaint)));
    }

    function filterComplaints(query) {
      const normalized = query.toLowerCase().trim();
      Array.from(complaintsList.children).forEach(card => {
        const visible = card.textContent.toLowerCase().includes(normalized);
        card.style.display = visible ? '' : 'none';
      });
    }

    setActiveNav();
    // renderComplaints(loadStoredComplaints());

    if (searchInput) {
      searchInput.addEventListener('input', event => {
        filterComplaints(event.target.value);
      });
    }

    if (floatingChat) {
      floatingChat.addEventListener('click', () => {
        window.location.href = 'aiassistant.html';
      });
    }

    if (filterButton) {
      filterButton.addEventListener('click', () => {
        alert('Filter functionality coming soon.');
      });
    }
  </script>
</body>
</html>