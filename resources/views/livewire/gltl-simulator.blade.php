<div class="min-h-screen bg-[#060a14] text-slate-300 font-sans pb-20">
    {{-- Force internal styles to avoid Tailwind issues --}}
    <style>
        .gltl-container { max-width: 1100px; margin: 0 auto; padding: 20px; }
        .gltl-card { background: #0f172a; border: 1px solid #1e293b; border-radius: 20px; padding: 24px; margin-bottom: 20px; }
        .gltl-input-group { background: #020617; border: 1px solid #1e293b; border-radius: 12px; padding: 12px 20px; display: flex; align-items: center; gap: 10px; }
        .gltl-input { background: transparent; border: none; color: white; font-size: 24px; font-weight: 900; width: 100%; outline: none; }
        .gltl-label { font-size: 10px; font-weight: 900; text-transform: uppercase; color: #64748b; margin-bottom: 8px; letter-spacing: 1px; }
        .gltl-btn-primary { background: #e11d48; color: white; border: none; padding: 16px; border-radius: 12px; font-weight: 900; cursor: pointer; width: 100%; text-transform: uppercase; font-size: 12px; transition: 0.2s; }
        .gltl-btn-primary:hover { background: #fb7185; }
        .gltl-btn-secondary { background: transparent; border: 1px solid #1e293b; color: #64748b; padding: 16px; border-radius: 12px; font-weight: 900; cursor: pointer; width: 100%; text-transform: uppercase; font-size: 12px; }
        .gltl-badge { padding: 4px 10px; border-radius: 6px; font-size: 10px; font-weight: 900; text-transform: uppercase; }
        .gltl-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; }
        .gltl-stat-item { background: #020617; padding: 12px; border-radius: 12px; border: 1px solid #0f172a; }
        .gltl-alert { background: #7f1d1d; color: #fecaca; padding: 6px 12px; border-radius: 8px; font-size: 9px; font-weight: 900; text-transform: uppercase; display: flex; align-items: center; gap: 6px; margin-top: 10px; animation: pulse 2s infinite; }
        @keyframes pulse { 0% { opacity: 1; } 50% { opacity: 0.6; } 100% { opacity: 1; } }
        .gltl-header-title { font-size: 28px; font-weight: 900; color: #f43f5e; text-transform: uppercase; letter-spacing: -1px; margin-bottom: 5px; }
        canvas { width: 100% !important; height: 300px !important; }
    </style>

    <div class="gltl-container">
        
        {{-- Header Section --}}
        <div class="gltl-card" style="text-align: center; border-color: #f43f5e33; background: linear-gradient(to bottom, #1e1b4b33, #0f172a);">
            <h1 class="gltl-header-title" style="color: #f43f5e !important;">Visualisasi Ledakan Hutang</h1>
            <p style="color: #94a3b8; font-size: 13px;">Matematika di balik lingkaran setan Gali Lobang Tutup Lobang</p>
            <div style="margin-top: 20px;">
                <canvas id="jsDebtChart"></canvas>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 20px;" id="main-grid">
            
            {{-- Sidebar --}}
            <div style="grid-column: span 1;">
                <div class="gltl-card">
                    <div class="gltl-label">1. Hutang Saat Ini</div>
                    <div class="gltl-input-group">
                        <span style="color: #14b8a6; font-weight: 900;">Rp</span>
                        <input type="number" id="jsInitialDebt" class="gltl-input" value="1000000" style="color: white !important;">
                    </div>
                </div>

                <div class="gltl-card">
                    <div class="gltl-label">Ringkasan Simulasi</div>
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 8px;">
                            <span>Aplikasi Terjerat</span>
                            <span id="jsTotalApps" style="color: white; font-weight: 900;">1 App</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 8px;">
                            <span>Total Durasi</span>
                            <span id="jsTotalDays" style="color: white; font-weight: 900;">0 Hari</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; font-size: 12px;">
                            <span>Uang Terbuang</span>
                            <span id="jsTotalLoss" style="color: #f43f5e; font-weight: 900;">Rp 0</span>
                        </div>
                    </div>
                    <div style="padding: 20px; background: #e11d4811; border: 1px solid #e11d4833; border-radius: 15px; text-align: center;">
                        <div class="gltl-label" style="color: #fb7185;">Total Hutang Akhir</div>
                        <div id="jsFinalDebt" style="font-size: 24px; font-weight: 900; color: white;">Rp 0</div>
                        <div id="jsMultiplier" style="font-size: 10px; color: #64748b; margin-top: 5px;">1x Lipat dari Awal</div>
                    </div>
                </div>

                <button class="gltl-btn-secondary" onclick="resetSimulator()">Reset Simulasi</button>
            </div>

            {{-- Timeline --}}
            <div style="grid-column: span 1;" id="jsTimeline">
                <div class="gltl-label">2. Alur Pinjaman & Deadline</div>
                <div id="cycleContainer"></div>
                
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button class="gltl-btn-primary" onclick="addCycle()">+ Gali Lobang Lagi (Pinjam Baru)</button>
                    <button class="gltl-btn-secondary" onclick="removeLast()" id="btnRemove" style="width: auto;">Hapus</button>
                </div>

                {{-- Warning --}}
                <div style="margin-top: 40px; padding: 30px; border-radius: 20px; background: #450a0a33; border: 1px solid #991b1b33; text-align: center;">
                    <div style="font-size: 32px; margin-bottom: 15px;">🛑</div>
                    <h3 style="color: white; font-weight: 900; margin-bottom: 10px; text-transform: uppercase;">Berhenti Sekarang.</h3>
                    <p style="font-size: 12px; color: #94a3b8; margin-bottom: 20px;">Data di atas menunjukkan bahwa secara matematis Anda akan selalu kalah. Semakin banyak lubang yang digali, semakin dalam Anda tenggelam.</p>
                    <a href="/lapor" style="display: inline-block; background: white; color: black; padding: 12px 24px; border-radius: 10px; font-weight: 900; font-size: 11px; text-decoration: none; text-transform: uppercase;">Dapatkan Bantuan</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Section --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let cycles = [];
        let chart = null;
        const adminFeeRate = 0.10; // Potongan 10% di awal
        const interestRate = 0.05; // Bunga 5% di akhir
        const pinjoliNames = ['EasyCash', 'AdaKami', 'Kredit Pintar', 'Akulaku', 'Kredivo', 'Indodana', 'UangMe', 'Rupiah Cepat'];
        const tenorOptions = [7, 14, 21, 30, 60];

        function init() {
            const input = document.getElementById('jsInitialDebt');
            input.addEventListener('input', updateAll);
            resetSimulator();
            
            // Initial Chart Load check
            let checkChart = setInterval(() => {
                if (typeof Chart !== 'undefined') {
                    clearInterval(checkChart);
                    renderChart();
                }
            }, 100);
        }

        function resetSimulator() {
            cycles = [];
            addCycle();
        }

        function addCycle() {
            const initialDebt = parseFloat(document.getElementById('jsInitialDebt').value) || 0;
            const lastTotalToPay = cycles.length > 0 ? cycles[cycles.length - 1].totalToPay : initialDebt;
            
            // Untuk menerima dana 'lastTotalToPay', plafond harus lebih besar karena dipotong admin
            // received = plafond * (1 - adminFeeRate)
            // plafond = received / (1 - adminFeeRate)
            let suggestedPlafond = Math.ceil((lastTotalToPay / (1 - adminFeeRate)) / 1000000) * 1000000;
            if (suggestedPlafond < 1000000) suggestedPlafond = 1000000;

            const received = suggestedPlafond * (1 - adminFeeRate);
            const interest = suggestedPlafond * interestRate;
            const totalToPay = suggestedPlafond + interest;
            
            cycles.push({
                id: Date.now(),
                provider: pinjoliNames[Math.floor(Math.random() * pinjoliNames.length)],
                plafond: suggestedPlafond,
                received: received,
                interest: interest,
                totalToPay: totalToPay,
                tenor: 14
            });
            
            updateAll();
        }

        function removeLast() {
            if (cycles.length > 1) {
                cycles.pop();
                updateAll();
            }
        }

        function updateCycle(index, field, value) {
            cycles[index][field] = value;
            if (field === 'plafond') {
                cycles[index].received = value * (1 - adminFeeRate);
                cycles[index].interest = value * interestRate;
                cycles[index].totalToPay = value + cycles[index].interest;
            }
            updateAll();
        }

        function updateAll() {
            const initialDebt = parseFloat(document.getElementById('jsInitialDebt').value) || 0;
            
            // Recalculate dependencies
            let prevTotalToPay = initialDebt;
            let cumulativeDays = 0;
            cycles.forEach((c, i) => {
                // Update based on current plafond
                c.received = c.plafond * (1 - adminFeeRate);
                c.interest = c.plafond * interestRate;
                c.totalToPay = c.plafond + c.interest;
                
                c.diff = c.received - prevTotalToPay;
                
                // Timeline calculation
                c.startDate = cumulativeDays;
                c.dueDate = cumulativeDays + c.tenor;
                c.alertDate = c.dueDate - 1;
                
                cumulativeDays = c.dueDate;
                prevTotalToPay = c.totalToPay;
            });

            renderUI();
            if (chart) updateChart();
        }

        function renderUI() {
            const container = document.getElementById('cycleContainer');
            container.innerHTML = '';
            
            let totalLoss = 0;
            let maxDays = 0;
            cycles.forEach((c, i) => {
                totalLoss += (c.plafond - c.received) + c.interest; // Potongan admin + bunga
                maxDays = c.dueDate;
                const statusColor = c.diff >= 0 ? '#14b8a6' : '#f43f5e';
                const statusText = c.diff > 0 ? `Sisa Rp ${Math.round(c.diff).toLocaleString('id-ID')}` : (Math.round(c.diff) === 0 ? 'Pas-pasan' : `Kurang Rp ${Math.abs(Math.round(c.diff)).toLocaleString('id-ID')}`);

                const card = document.createElement('div');
                card.className = 'gltl-card';
                card.innerHTML = `
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="background: #e11d4811; color: #f43f5e; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 8px; font-weight: 900; font-size: 14px; border: 1px solid #e11d4833;">${i+1}</div>
                            <div>
                                <div style="font-weight: 900; color: white; font-size: 12px;">PINJAMAN KE-${i+1}</div>
                                <div style="font-size: 10px; color: #64748b;">Aplikasi ${c.provider}</div>
                            </div>
                        </div>
                        <div style="display: flex; gap: 5px;">
                            <select onchange="updateCycle(${i}, 'tenor', parseInt(this.value))" style="background: #020617; border: 1px solid #1e293b; color: #14b8a6; border-radius: 8px; padding: 5px; font-size: 10px; font-weight: 900;">
                                ${tenorOptions.map(t => `<option value="${t}" ${t === c.tenor ? 'selected' : ''}>Tenor ${t} Hari</option>`).join('')}
                            </select>
                            <select onchange="updateCycle(${i}, 'provider', this.value)" style="background: #020617; border: 1px solid #1e293b; color: white; border-radius: 8px; padding: 5px; font-size: 10px; font-weight: 900;">
                                ${pinjoliNames.map(name => `<option value="${name}" ${name === c.provider ? 'selected' : ''}>${name}</option>`).join('')}
                            </select>
                            <select onchange="updateCycle(${i}, 'plafond', parseInt(this.value))" style="background: #020617; border: 1px solid #1e293b; color: white; border-radius: 8px; padding: 5px; font-size: 10px; font-weight: 900;">
                                ${Array.from({length: 50}, (_, k) => (k+1)*1000000).map(amt => `<option value="${amt}" ${amt === c.plafond ? 'selected' : ''}>Pinjam Rp ${(amt/1000000)} Juta</option>`).join('')}
                            </select>
                        </div>
                    </div>
                    
                    <div style="background: ${statusColor}11; border: 1px solid ${statusColor}33; padding: 10px 15px; border-radius: 10px; margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                        <div style="width: 6px; height: 6px; border-radius: 50%; background: ${statusColor};"></div>
                        <div style="font-size: 10px; font-weight: 900; color: ${statusColor}; text-transform: uppercase;">Status: ${statusText}</div>
                    </div>

                    <div class="gltl-grid">
                        <div class="gltl-stat-item">
                            <div class="gltl-label" style="font-size: 7px; margin-bottom: 4px;">Diterima (Cair)</div>
                            <div style="font-size: 11px; font-weight: 900; color: #14b8a6;">Rp ${Math.round(c.received).toLocaleString('id-ID')}</div>
                            <div style="font-size: 7px; color: #64748b;">Potongan 10%</div>
                        </div>
                        <div class="gltl-stat-item">
                            <div class="gltl-label" style="font-size: 7px; margin-bottom: 4px;">Bunga (5%)</div>
                            <div style="font-size: 11px; font-weight: 900; color: #f43f5e;">+ Rp ${Math.round(c.interest).toLocaleString('id-ID')}</div>
                        </div>
                        <div class="gltl-stat-item">
                            <div class="gltl-label" style="font-size: 7px; margin-bottom: 4px;">Total Bayar</div>
                            <div style="font-size: 11px; font-weight: 900; color: white;">Rp ${Math.round(c.totalToPay).toLocaleString('id-ID')}</div>
                        </div>
                        <div class="gltl-stat-item" style="border-color: #f43f5e66; background: #450a0a22;">
                            <div class="gltl-label" style="font-size: 7px; margin-bottom: 4px; color: #fb7185;">Jatuh Tempo</div>
                            <div style="font-size: 11px; font-weight: 900; color: white;">Hari ke-${c.dueDate}</div>
                        </div>
                    </div>

                    <div class="gltl-alert">
                        <span style="font-size: 12px;">⚠️</span>
                        <span>Hari ke-${c.alertDate}: Penagihan via WA/SMS Dimulai (Kontak Darurat Dihubungi)</span>
                    </div>
                `;
                container.appendChild(card);
            });

            // Summary update
            const initial = parseFloat(document.getElementById('jsInitialDebt').value) || 0;
            const final = cycles[cycles.length - 1].totalToPay;
            document.getElementById('jsTotalApps').innerText = cycles.length + ' App';
            document.getElementById('jsTotalDays').innerText = maxDays + ' Hari';
            document.getElementById('jsTotalLoss').innerText = 'Rp ' + Math.round(totalLoss).toLocaleString('id-ID');
            document.getElementById('jsFinalDebt').innerText = 'Rp ' + Math.round(final).toLocaleString('id-ID');
            document.getElementById('jsMultiplier').innerText = (final/initial).toFixed(2) + 'x Lipat dari Awal';
            document.getElementById('btnRemove').disabled = cycles.length <= 1;
        }

        function renderChart() {
            const ctx = document.getElementById('jsDebtChart').getContext('2d');
            chart = new Chart(ctx, {
                type: 'line',
                data: getChartData(),
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true, grid: { color: '#1e293b' }, ticks: { color: '#64748b', font: { weight: 'bold' }, callback: v => 'Rp ' + v.toLocaleString('id-ID') } },
                        x: { grid: { display: false }, ticks: { color: '#64748b', font: { weight: 'bold' } } }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: { backgroundColor: '#0f172a', padding: 12, callbacks: { label: c => ' Rp ' + c.raw.toLocaleString('id-ID') } }
                    }
                }
            });
        }

        function getChartData() {
            const initial = parseFloat(document.getElementById('jsInitialDebt').value) || 0;
            const labels = ['Awal', ...cycles.map((_, i) => `App ${i+1}`)];
            const data = [initial, ...cycles.map(c => c.totalToPay)];
            return {
                labels: labels,
                datasets: [{
                    data: data,
                    borderColor: '#f43f5e',
                    backgroundColor: 'rgba(244, 63, 94, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            };
        }

        function updateChart() {
            chart.data = getChartData();
            chart.update('none'); // Update without animation for snappiness
        }

        // Boot
        setTimeout(init, 500);
    </script>
</div>
