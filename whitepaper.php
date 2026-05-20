<?php
declare(strict_types=1);

// --- 1. AZ ADATSTRUKTÚRA (A KORÁBBI OSZTÁLY) ---
class EnterpriseWhitepaperFull {
    private string $version = "V15_AUDIT_EDITION";
    
    public function getDocumentData(): array {
        return [
            "metadata" => [
                "document_type" => "Technical & Legal Master Document",
                "version" => $this->version,
                "target_audience" => "Energy Web Foundation | ESG Auditors | Institutional Buyers",
                "generated_at" => date("Y-m-d H:i:s T"),
                "legal_entity" => "VSE Aggregator s.r.o."
            ],
            "chapters" => [
                [
                    "chapter" => "01",
                    "title" => "Executive Summary",
                    "content" => "VSE Protocol is an enterprise-grade Decentralized Physical Infrastructure Network (DePIN) transforming distributed residential solar energy into verified, institutional-grade Energy Attribute Certificates (EACs)."
                ],
                [
                    "chapter" => "02",
                    "title" => "System Architecture & Data Flow",
                    "content" => "Physical Inverter → Aggregator Backend → Oracle Engine → Blockchain State",
                    "details" => [
                        "Ingestion" => "Secure API connection (e.g., Solarman/Deye) running daily batched cron jobs at 23:50 local time to prevent timezone/rollover data loss.",
                        "Hash_Chain" => "Every telemetry packet is cryptographically hashed (SHA-256) before on-chain submission, ensuring an immutable audit trail.",
                        "Redundancy" => "Dual-node oracle setup with automated failover.",
                        "Fallback" => "In case of API outage, the backend retains a local encrypted queue. Historical endpoints backfill missing data."
                    ]
                ],
                [
                    "chapter" => "03",
                    "title" => "Data Verification & Anti-Spoofing",
                    "content" => "Trustless verification of off-chain energy production.",
                    "details" => [
                        "Spoofing_Prevention" => "Cross-referencing reported yield with regional weather APIs and theoretical max capacity of hardware. Outliers are quarantined.",
                        "Duplication_Handling" => "Idempotent processing. Each daily batch generates a unique cryptographic nonce. The smart contract rejects duplicates.",
                        "Outage_Handling" => "Zero-data days result in zero minting. Interpolation is strictly forbidden to maintain 1:1 token-to-kWh integrity."
                    ]
                ],
                [
                    "chapter" => "04",
                    "title" => "Tokenization & Retirement Logic",
                    "content" => "1 VSE Token = 1 kWh of verified green energy.",
                    "details" => [
                        "No_Deflation" => "VSE employs a zero-speculation model. Token supply is strictly bound to historical energy production.",
                        "Minting" => "Tokens are minted in aggregate to the Aggregator's audited Treasury Wallet based on the daily Oracle payload.",
                        "Retirement_Burn" => "Enterprise ESG purchases are sent to a Null Address. Transaction metadata includes the Enterprise Corporate ID and offset period."
                    ]
                ],
                [
                    "chapter" => "05",
                    "title" => "The Aggregator Entity (Legal)",
                    "content" => "The protocol is operated commercially by VSE Aggregator s.r.o., a registered European corporate entity.",
                    "details" => [
                        "B2B_Sales" => "Issuing official fiat-based (EUR) invoices to enterprise clients for EAC purchases.",
                        "GDPR_Compliance" => "On-chain data contains zero PII. Wallet mapping and user KYC are stored on secure off-chain servers.",
                        "Standards" => "Built to align with ISO 14064 (GHG Accounting) and ISO 17029 (Validation and Verification)."
                    ]
                ],
                [
                    "chapter" => "06",
                    "title" => "Revenue Distribution",
                    "content" => "Strict 70/30 Institutional Revenue Share Model.",
                    "details" => [
                        "Accounting" => "Internal off-chain ledger tracks each user's proportional energy contribution.",
                        "Distribution" => "70% of fiat is distributed to hardware owners via SEPA bank transfers ('Data Provision Fees').",
                        "Treasury" => "30% is retained by the s.r.o. for API overhead, server infrastructure, and EWF audit fees."
                    ]
                ],
                [
                    "chapter" => "07",
                    "title" => "Risk Management",
                    "content" => "Contingency protocols for systemic resilience.",
                    "details" => [
                        "API_Outage" => "Buffered in database; retried using historical endpoints up to 72 hours.",
                        "Chain_Outage" => "State is preserved off-chain. Transactions queue until RPCs stabilize.",
                        "Inverter_Failure" => "Hardware risk is borne by the user. 0 kWh = 0 tokens. System remains economically whole.",
                        "Regulatory" => "s.r.o. structure isolates protocol from MiCA crypto-asset regulations (B2B data brokerage)."
                    ]
                ],
                [
                    "chapter" => "08",
                    "title" => "Governance & Access Control",
                    "content" => "Strict Separation of Duties using OpenZeppelin's AccessControl.",
                    "details" => [
                        "Smart_Contract" => "MINTER_ROLE is exclusively held by the Backend Oracle address.",
                        "Treasury_Security" => "Corporate Multi-Sig wallet requires 2-of-3 board member approvals.",
                        "Future_State" => "Transition toward a decentralized Foundation model post-enterprise adoption."
                    ]
                ],
                [
                    "chapter" => "09",
                    "title" => "Compliance & ESG Alignment",
                    "content" => "Built for the next generation of corporate reporting.",
                    "details" => [
                        "EU_CSRD" => "Corporate Sustainability Reporting Directive compliant data structures.",
                        "GHG_Protocol" => "Token retirements directly offset Scope 2 (purchased electricity) emissions.",
                        "EAC_Standards" => "Mirrors Renewable Energy Guarantees of Origin (REGO/GO) with timestamped proof."
                    ]
                ]
            ]
        ];
    }
}

$whitepaper = new EnterpriseWhitepaperFull();
$data = $whitepaper->getDocumentData();
?>

<!-- --- 2. A GYÖNYÖRŰ HTML / CSS RENDERELÉS --- -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VSE PROTOCOL | <?= $data['metadata']['version'] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg: #030303;
            --surface: #0a0a0a;
            --border: #222;
            --text-main: #a0a0a0;
            --text-light: #ffffff;
            --accent: #00ff66; /* Zöld hacker/audit vibe */
            --danger: #ff2a55;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            background-color: var(--bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            padding-bottom: 100px;
        }

        h1, h2, h3 { color: var(--text-light); }
        
        .mono { font-family: 'Space Mono', monospace; }
        
        .container { max-width: 1000px; margin: 0 auto; padding: 0 20px; }

        /* HEADER */
        header {
            border-bottom: 1px solid var(--border);
            padding: 40px 0;
            margin-bottom: 60px;
            background: repeating-linear-gradient(
                45deg,
                var(--bg),
                var(--bg) 10px,
                #050505 10px,
                #050505 20px
            );
        }
        
        .sys-badge {
            display: inline-block;
            border: 1px solid var(--accent);
            color: var(--accent);
            padding: 5px 10px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .title-block h1 {
            font-size: 3rem;
            font-weight: 900;
            letter-spacing: -2px;
            text-transform: uppercase;
        }

        .meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
            border-top: 1px solid var(--border);
            padding-top: 20px;
        }
        
        .meta-item p { font-size: 11px; color: #666; text-transform: uppercase; letter-spacing: 1px; }
        .meta-item strong { color: var(--text-light); font-size: 13px; }

        /* CHAPTERS */
        .chapter {
            margin-bottom: 80px;
            position: relative;
        }
        
        .chapter-header {
            display: flex;
            align-items: baseline;
            gap: 15px;
            margin-bottom: 25px;
            border-bottom: 1px dashed var(--border);
            padding-bottom: 10px;
        }
        
        .chapter-num {
            font-size: 1.5rem;
            color: var(--accent);
            font-weight: bold;
        }
        
        .chapter-title { font-size: 1.8rem; letter-spacing: -1px; text-transform: uppercase; }
        
        .chapter-content { font-size: 1.1rem; margin-bottom: 30px; }

        /* TERMINAL / DETAILS BOX */
        .cyber-box {
            background-color: var(--surface);
            border: 1px solid var(--border);
            box-shadow: 6px 6px 0px #000;
            padding: 30px;
            position: relative;
        }
        
        .cyber-box::before {
            content: 'SYSTEM_DETAILS';
            position: absolute;
            top: -10px;
            left: 20px;
            background: var(--bg);
            color: #555;
            font-size: 10px;
            padding: 0 5px;
            letter-spacing: 2px;
        }

        .detail-item {
            margin-bottom: 20px;
            padding-left: 15px;
            border-left: 2px solid var(--accent);
        }
        .detail-item:last-child { margin-bottom: 0; }
        
        .detail-key {
            color: var(--text-light);
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 5px;
            display: block;
        }
        
        .detail-val { font-size: 14px; color: #bbb; }

        /* FOOTER */
        footer {
            text-align: center;
            border-top: 1px solid var(--border);
            padding-top: 40px;
            margin-top: 100px;
            color: #444;
            font-size: 12px;
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <div class="sys-badge mono">STATUS: AUTHORIZED FOR AUDIT</div>
        <div class="title-block">
            <h1>VSE PROTOCOL</h1>
            <h2 style="color: #666; font-weight: 400;">INSTITUTIONAL MASTER DOCUMENT</h2>
        </div>
        
        <div class="meta-grid mono">
            <div class="meta-item">
                <p>Version</p>
                <strong><?= $data['metadata']['version'] ?></strong>
            </div>
            <div class="meta-item">
                <p>Entity</p>
                <strong><?= $data['metadata']['legal_entity'] ?></strong>
            </div>
            <div class="meta-item">
                <p>Generated</p>
                <strong><?= $data['metadata']['generated_at'] ?></strong>
            </div>
            <div class="meta-item">
                <p>Target Audience</p>
                <strong style="color: var(--accent);"><?= $data['metadata']['target_audience'] ?></strong>
            </div>
        </div>
    </div>
</header>

<main class="container">
    <?php foreach ($data['chapters'] as $chapter): ?>
        <section class="chapter">
            <div class="chapter-header mono">
                <span class="chapter-num">[<?= $chapter['chapter'] ?>]</span>
                <h2 class="chapter-title"><?= $chapter['title'] ?></h2>
            </div>
            
            <p class="chapter-content"><?= $chapter['content'] ?></p>
            
            <?php if (isset($chapter['details'])): ?>
                <div class="cyber-box mono">
                    <?php foreach ($chapter['details'] as $key => $value): ?>
                        <div class="detail-item">
                            <span class="detail-key"><?= str_replace('_', ' ', $key) ?>:</span>
                            <span class="detail-val"><?= $value ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>
</main>

<footer class="mono">
    <p>CONFIDENTIAL & PROPRIETARY // END OF DOCUMENT</p>
    <p style="margin-top: 10px;">&copy; 2026 <?= $data['metadata']['legal_entity'] ?></p>
</footer>

</body>
</html>
