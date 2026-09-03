<?php
declare(strict_types=1);

function vse_h(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$release = 'v1.1.0-beta.1_PROTOCOL';
$versionCandidates = [
    dirname(__DIR__, 2) . '/VERSION',
    dirname(__DIR__) . '/VERSION',
    __DIR__ . '/../../VERSION',
    __DIR__ . '/../VERSION',
];

foreach ($versionCandidates as $candidate) {
    if (is_file($candidate) && is_readable($candidate)) {
        $value = trim((string) file_get_contents($candidate));
        if ($value !== '') {
            $release = $value;
            break;
        }
    }
}

$whitepaperVersion = '1.1';
$updated = 'September 2026';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="VSE Protocol technical whitepaper: machine-verifiable renewable-energy evidence, immutable audit, VSE Units, retirement and enterprise verification infrastructure.">
    <title>VSE Protocol // Whitepaper</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        :root {
            --wp-bg: #020403;
            --wp-panel: rgba(5, 12, 8, .88);
            --wp-panel-2: rgba(8, 18, 11, .72);
            --wp-green: #33ff88;
            --wp-green-soft: rgba(51,255,136,.15);
            --wp-line: rgba(51,255,136,.24);
            --wp-text: #e7f7ec;
            --wp-muted: #8da596;
            --wp-red: #ff4f66;
            --wp-amber: #ffc857;
            --wp-cyan: #59e1ff;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            background:
                radial-gradient(circle at 74% 4%, rgba(0,255,95,.10), transparent 30rem),
                radial-gradient(circle at 20% 15%, rgba(0,255,140,.05), transparent 26rem),
                linear-gradient(180deg, #020403 0%, #030706 48%, #010201 100%);
            color: var(--wp-text);
            font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.68;
        }

        a { color: inherit; }

        .wp-shell {
            width: min(1440px, calc(100% - 36px));
            margin: 0 auto;
        }

        .wp-topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(18px);
            background: rgba(1,4,2,.88);
            border-bottom: 1px solid var(--wp-line);
        }

        .wp-nav {
            min-height: 72px;
            display: flex;
            align-items: center;
            gap: 26px;
        }

        .wp-brand {
            text-decoration: none;
            font-family: "Courier New", monospace;
            font-weight: 900;
            letter-spacing: .13em;
            color: var(--wp-green);
            white-space: nowrap;
        }

        .wp-links {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            margin-left: auto;
            align-items: center;
        }

        .wp-links a {
            text-decoration: none;
            color: #bad0c1;
            font: 700 11px/1.2 "Courier New", monospace;
            letter-spacing: .11em;
            text-transform: uppercase;
        }

        .wp-links a:hover,
        .wp-links a.active { color: var(--wp-green); }

        .wp-login {
            border: 1px solid var(--wp-line);
            padding: 10px 14px;
        }

        .wp-hero {
            padding: 100px 0 70px;
            border-bottom: 1px solid rgba(51,255,136,.14);
        }

        .wp-kicker {
            display: inline-flex;
            gap: 10px;
            align-items: center;
            border: 1px solid var(--wp-line);
            background: rgba(51,255,136,.045);
            padding: 8px 12px;
            color: var(--wp-green);
            font: 700 11px/1 "Courier New", monospace;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .wp-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--wp-green);
            box-shadow: 0 0 16px var(--wp-green);
        }

        .wp-hero-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.45fr) minmax(320px, .7fr);
            gap: 44px;
            align-items: end;
            margin-top: 28px;
        }

        .wp-title {
            margin: 0;
            max-width: 980px;
            font-size: clamp(48px, 7.8vw, 112px);
            line-height: .92;
            letter-spacing: -.06em;
            font-weight: 900;
            text-transform: uppercase;
        }

        .wp-title .green { color: var(--wp-green); }

        .wp-lead {
            margin: 28px 0 0;
            max-width: 900px;
            color: #b9cbc0;
            font-size: clamp(17px, 2vw, 24px);
            line-height: 1.55;
        }

        .wp-meta {
            border: 1px solid var(--wp-line);
            background: linear-gradient(180deg, rgba(51,255,136,.06), rgba(0,0,0,.24));
            padding: 24px;
        }

        .wp-meta-row {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            border-bottom: 1px solid rgba(51,255,136,.12);
            padding: 12px 0;
            font-family: "Courier New", monospace;
            font-size: 12px;
        }

        .wp-meta-row:last-child { border-bottom: 0; }
        .wp-meta-row span:first-child { color: var(--wp-muted); }
        .wp-meta-row strong { color: var(--wp-green); text-align: right; }

        .wp-layout {
            display: grid;
            grid-template-columns: 270px minmax(0, 1fr);
            gap: 50px;
            padding: 58px 0 100px;
        }

        .wp-toc {
            align-self: start;
            position: sticky;
            top: 98px;
            border-left: 1px solid var(--wp-line);
            padding-left: 18px;
        }

        .wp-toc-title {
            color: var(--wp-green);
            font: 800 11px/1 "Courier New", monospace;
            letter-spacing: .14em;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .wp-toc a {
            display: block;
            text-decoration: none;
            color: #81968a;
            font-size: 13px;
            padding: 6px 0;
        }

        .wp-toc a:hover { color: var(--wp-green); }

        .wp-main { min-width: 0; }

        .wp-section {
            scroll-margin-top: 100px;
            padding: 26px 0 54px;
            border-bottom: 1px solid rgba(51,255,136,.12);
        }

        .wp-num {
            color: var(--wp-green);
            font: 800 12px/1 "Courier New", monospace;
            letter-spacing: .13em;
            text-transform: uppercase;
        }

        .wp-section h2 {
            margin: 12px 0 18px;
            font-size: clamp(32px, 4.2vw, 58px);
            line-height: 1;
            letter-spacing: -.035em;
        }

        .wp-section h3 {
            margin: 34px 0 12px;
            color: #f0fff5;
            font-size: 22px;
        }

        .wp-section p { color: #b8c9be; }

        .wp-callout {
            margin: 28px 0;
            border: 1px solid var(--wp-line);
            border-left: 4px solid var(--wp-green);
            background: var(--wp-panel-2);
            padding: 20px 22px;
        }

        .wp-callout strong {
            display: block;
            margin-bottom: 7px;
            color: var(--wp-green);
            font: 800 12px/1.2 "Courier New", monospace;
            letter-spacing: .11em;
            text-transform: uppercase;
        }

        .wp-flow {
            margin: 28px 0;
            overflow-x: auto;
            border: 1px solid var(--wp-line);
            background: #010302;
            padding: 22px;
            color: var(--wp-green);
            font: 700 13px/1.85 "Courier New", monospace;
            white-space: pre;
            box-shadow: inset 0 0 45px rgba(51,255,136,.025);
        }

        .wp-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0,1fr));
            gap: 18px;
            margin: 26px 0;
        }

        .wp-card {
            border: 1px solid rgba(51,255,136,.18);
            background: var(--wp-panel);
            padding: 22px;
        }

        .wp-card h4 {
            margin: 0 0 8px;
            color: var(--wp-green);
            font-size: 15px;
            letter-spacing: .04em;
        }

        .wp-card p {
            margin: 0;
            font-size: 14px;
            color: #9fb1a6;
        }

        .wp-list {
            margin: 18px 0;
            padding-left: 20px;
            color: #b8c9be;
        }

        .wp-list li { margin: 8px 0; }
        .wp-list li::marker { color: var(--wp-green); }

        .wp-rule {
            margin: 28px 0;
            padding: 24px;
            background: linear-gradient(90deg, rgba(51,255,136,.09), rgba(51,255,136,.015));
            border: 1px solid var(--wp-line);
            font-size: 22px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .02em;
        }

        .wp-rule span { color: var(--wp-green); }

        .wp-status {
            display: inline-block;
            font: 800 11px/1 "Courier New", monospace;
            letter-spacing: .1em;
            padding: 7px 9px;
            border: 1px solid currentColor;
            margin-right: 8px;
        }

        .ok { color: var(--wp-green); }
        .reject { color: var(--wp-red); }
        .warning { color: var(--wp-amber); }
        .info { color: var(--wp-cyan); }

        .wp-table-wrap { overflow-x: auto; margin: 28px 0; }
        .wp-table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
            font-size: 14px;
        }

        .wp-table th,
        .wp-table td {
            padding: 13px 14px;
            border: 1px solid rgba(51,255,136,.14);
            text-align: left;
            vertical-align: top;
        }

        .wp-table th {
            color: var(--wp-green);
            background: rgba(51,255,136,.06);
            font: 800 11px/1.2 "Courier New", monospace;
            letter-spacing: .09em;
            text-transform: uppercase;
        }

        .wp-table td { color: #aebfb5; }

        .wp-big-quote {
            margin: 40px 0;
            padding: 38px 24px;
            text-align: center;
            border-top: 1px solid var(--wp-line);
            border-bottom: 1px solid var(--wp-line);
            font-size: clamp(32px, 5vw, 72px);
            font-weight: 900;
            line-height: .96;
            letter-spacing: -.045em;
            text-transform: uppercase;
        }

        .wp-big-quote span { color: var(--wp-green); }

        .wp-footer {
            border-top: 1px solid var(--wp-line);
            padding: 34px 0 50px;
            color: #6f8277;
            font-size: 12px;
        }

        .wp-footer-inner {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .wp-footer strong { color: var(--wp-green); }

        @media (max-width: 980px) {
            .wp-hero-grid,
            .wp-layout { grid-template-columns: 1fr; }
            .wp-toc { position: static; border-left: 0; border: 1px solid var(--wp-line); padding: 18px; }
            .wp-toc a { display: inline-block; margin-right: 12px; }
            .wp-grid { grid-template-columns: 1fr; }
            .wp-links { display: none; }
            .wp-hero { padding-top: 70px; }
        }
    </style>
</head>
<body>

<header class="wp-topbar">
    <div class="wp-shell wp-nav">
        <a class="wp-brand" href="index.php">VSE // PROTOCOL</a>
        <nav class="wp-links" aria-label="Primary navigation">
            <a href="solution.php">Solution</a>
            <a href="platform.php">Platform</a>
            <a href="standard.php">Standard</a>
            <a href="protocol.php">Protocol</a>
            <a class="active" href="whitepaper.php">Whitepaper</a>
            <a href="plans.php">Plans</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a class="wp-login" href="login.php">Sign In</a>
        </nav>
    </div>
</header>

<section class="wp-hero">
    <div class="wp-shell">
        <span class="wp-kicker"><span class="wp-dot"></span> Technical Whitepaper // VSE Protocol</span>

        <div class="wp-hero-grid">
            <div>
                <h1 class="wp-title">
                    From physical energy<br>
                    to <span class="green">verifiable proof.</span>
                </h1>
                <p class="wp-lead">
                    VSE Protocol is a machine-verifiable renewable-energy evidence infrastructure designed to transform authenticated production telemetry into immutable, single-use digital energy proofs for enterprise buyers.
                </p>
            </div>

            <aside class="wp-meta" aria-label="Whitepaper metadata">
                <div class="wp-meta-row"><span>WHITEPAPER</span><strong><?= vse_h($whitepaperVersion) ?></strong></div>
                <div class="wp-meta-row"><span>SOFTWARE RELEASE</span><strong><?= vse_h($release) ?></strong></div>
                <div class="wp-meta-row"><span>UPDATED</span><strong><?= vse_h($updated) ?></strong></div>
                <div class="wp-meta-row"><span>STATUS</span><strong>TEST-READY / NOT PRODUCTION-CERTIFIED</strong></div>
                <div class="wp-meta-row"><span>MODEL</span><strong>MACHINE-VERIFIABLE EVIDENCE</strong></div>
                <div class="wp-meta-row"><span>AUTHOR</span><strong>TAMÁS VARGA ("NERGAL")</strong></div>
            </aside>
        </div>
    </div>
</section>

<div class="wp-shell wp-layout">
    <aside class="wp-toc">
        <div class="wp-toc-title">Contents</div>
        <a href="#executive-summary">01 Executive Summary</a>
        <a href="#problem">02 The Problem</a>
        <a href="#solution">03 The VSE Solution</a>
        <a href="#architecture">04 Architecture</a>
        <a href="#source">05 Authoritative Source</a>
        <a href="#evidence">06 Evidence & Integrity</a>
        <a href="#calculation">07 Energy Calculation</a>
        <a href="#audit">08 Audit Chain</a>
        <a href="#unit">09 VSE Unit</a>
        <a href="#retirement">10 Retirement</a>
        <a href="#proof">11 Final Proof</a>
        <a href="#antifraud">12 Anti-Fraud</a>
        <a href="#producer">13 Producer Model</a>
        <a href="#buyer">14 Buyer Model</a>
        <a href="#enterprise">15 Enterprise Layer</a>
        <a href="#security">16 Security</a>
        <a href="#regulatory">17 Regulatory Position</a>
        <a href="#economics">18 Commercial Model</a>
        <a href="#roadmap">19 Roadmap</a>
        <a href="#conclusion">20 Conclusion</a>
    </aside>

    <main class="wp-main">

        <section class="wp-section" id="executive-summary">
            <div class="wp-num">01 // Executive Summary</div>
            <h2>Renewable-energy claims need evidence that machines can verify.</h2>

            <p>
                VSE Protocol is designed to connect physical renewable-energy production with cryptographic verification and enterprise consumption claims. Its purpose is not to create a speculative token economy. Its purpose is to create a deterministic chain of evidence from an identifiable energy-producing device to a final, single-use proof.
            </p>

            <div class="wp-flow">PHYSICAL ENERGY ASSET
        ↓
MANUFACTURER-AUTHORITATIVE DATA
        ↓
RAW EVIDENCE
        ↓
CRYPTOGRAPHIC HASH
        ↓
DETERMINISTIC VALIDATION
        ↓
ENERGY CALCULATION
        ↓
AUDIT CHAIN
        ↓
VSE UNIT
        ↓
MINT
        ↓
ALLOCATION
        ↓
RETIREMENT
        ↓
FINAL MACHINE-VERIFIABLE PROOF</div>

            <div class="wp-callout">
                <strong>Core Objective</strong>
                Preserve the relationship between real renewable-energy production, its original machine evidence, its verified digital representation, and its final enterprise use.
            </div>
        </section>

        <section class="wp-section" id="problem">
            <div class="wp-num">02 // The Problem</div>
            <h2>“Renewable” is easy to say. Hard evidence is harder.</h2>

            <p>
                A renewable-energy claim becomes meaningful only when the underlying production can be traced, validated, protected against duplication, and linked to a final use event.
            </p>

            <div class="wp-grid">
                <article class="wp-card">
                    <h4>Source Ambiguity</h4>
                    <p>Claims may exist without a direct relationship to authoritative machine telemetry.</p>
                </article>
                <article class="wp-card">
                    <h4>Manual Intervention</h4>
                    <p>Human-entered totals, spreadsheets and editable reports introduce trust dependencies.</p>
                </article>
                <article class="wp-card">
                    <h4>Duplicate Use</h4>
                    <p>The same underlying energy can become problematic if represented or claimed repeatedly.</p>
                </article>
                <article class="wp-card">
                    <h4>Weak Finality</h4>
                    <p>A claim without irreversible retirement can remain ambiguous after commercial use.</p>
                </article>
            </div>

            <p>
                VSE addresses this by treating energy verification as a data-integrity and state-transition problem rather than as a document-generation problem.
            </p>
        </section>

        <section class="wp-section" id="solution">
            <div class="wp-num">03 // The VSE Solution</div>
            <h2>Evidence first. Mathematics second. Proof last.</h2>

            <p>
                VSE is built as an automated verification infrastructure. The protocol captures manufacturer-authoritative data, preserves raw evidence, calculates cryptographic fingerprints, validates source and time integrity, calculates energy under a defined methodology, links the result into an audit chain, creates a VSE Unit, and permanently retires that unit when used. The VSE seal does not create validity; evidence earns the seal by passing the active protocol.
            </p>

            <div class="wp-rule"><span>NO EVIDENCE</span> = NO VERIFIED UNIT = NO VALID PROOF</div>

            <p>
                This principle prevents the platform from presenting fabricated live values, fake blockchain transactions, synthetic manufacturer confirmations, invented energy inventory, or retirement events that do not exist.
            </p>
        </section>

        <section class="wp-section" id="architecture">
            <div class="wp-num">04 // Architecture</div>
            <h2>A layered verification system.</h2>

            <div class="wp-table-wrap">
                <table class="wp-table">
                    <thead>
                        <tr>
                            <th>Layer</th>
                            <th>Purpose</th>
                            <th>Examples</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Physical Layer</td>
                            <td>Origin of renewable production.</td>
                            <td>Solar inverter, smart meter, logger.</td>
                        </tr>
                        <tr>
                            <td>Manufacturer Layer</td>
                            <td>Machine-authoritative telemetry access.</td>
                            <td>Official manufacturer cloud / OpenAPI.</td>
                        </tr>
                        <tr>
                            <td>Evidence Layer</td>
                            <td>Preserve raw source response and identity.</td>
                            <td>Raw payload, source metadata, SHA-256 hash.</td>
                        </tr>
                        <tr>
                            <td>Validation Layer</td>
                            <td>Reject invalid, duplicate or incomplete evidence.</td>
                            <td>Device IDs, timestamps, intervals, gaps.</td>
                        </tr>
                        <tr>
                            <td>Audit Layer</td>
                            <td>Append-only cryptographic state history.</td>
                            <td>Previous hash, current audit hash.</td>
                        </tr>
                        <tr>
                            <td>Registry Layer</td>
                            <td>Create and finalize verified units.</td>
                            <td>Mint, duplicate prevention, retirement.</td>
                        </tr>
                        <tr>
                            <td>Enterprise Layer</td>
                            <td>Commercial use, buyer controls and reporting.</td>
                            <td>Organizations, APIs, contracts, SLA, billing.</td>
                        </tr>
                        <tr>
                            <td>Proof Layer</td>
                            <td>Expose machine-verifiable final evidence.</td>
                            <td>JSON proof, public verification, signatures.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="wp-section" id="source">
            <div class="wp-num">05 // Authoritative Source</div>
            <h2>The producer is not the source of truth. The machine is.</h2>

            <p>
                VSE is designed to accept production data only when it is associated with an identifiable physical energy asset and retrieved through an approved machine-authoritative path.
            </p>

            <div class="wp-flow">INVERTER / SMART METER
        ↓
OFFICIAL MANUFACTURER INFRASTRUCTURE
        ↓
AUTHENTICATED API ACCESS
        ↓
VSE ORACLE</div>

            <p>Examples of acceptable source paths may include:</p>
            <ul class="wp-list">
                <li>solar inverter telemetry;</li>
                <li>smart-meter telemetry;</li>
                <li>approved hardware logger telemetry;</li>
                <li>official manufacturer cloud infrastructure;</li>
                <li>authenticated manufacturer OpenAPI access representing the underlying hardware.</li>
            </ul>

            <p>The following are not considered primary authoritative production evidence:</p>

            <p>
                <span class="wp-status reject">REJECTED</span>
                manual production totals, screenshots, spreadsheets, user-generated CSV claims, edited payloads and unverifiable external totals.
            </p>
        </section>

        <section class="wp-section" id="evidence">
            <div class="wp-num">06 // Evidence & Cryptographic Integrity</div>
            <h2>Raw evidence exists before the proof.</h2>

            <p>
                The protocol is evidence-first. The original source response must be captured before verified state is created. VSE then calculates its own cryptographic fingerprint of that evidence.
            </p>

            <div class="wp-callout">
                <strong>Independent Calculation</strong>
                A hash is not trusted simply because an external party supplies it. VSE calculates its own cryptographic fingerprint from the evidence it receives.
            </div>

            <p>
                Where available, authenticated requests, digital signatures, HMAC validation or equivalent integrity mechanisms may be checked in addition to raw evidence hashing.
            </p>
        </section>

        <section class="wp-section" id="calculation">
            <div class="wp-num">07 // Deterministic Energy Calculation</div>
            <h2>The protocol calculates. It does not accept claimed totals.</h2>

            <p>
                Energy represented by VSE is calculated under the active VSE methodology using validated source data for a defined interval. The result must be deterministic: identical valid evidence under the same methodology and protocol version should produce the same outcome.
            </p>

            <p>Validation may include:</p>
            <ul class="wp-list">
                <li>source identity;</li>
                <li>plant / inverter / logger / meter identifiers;</li>
                <li>source timestamps;</li>
                <li>interval start and end;</li>
                <li>sample ordering;</li>
                <li>missing samples;</li>
                <li>excessive gaps;</li>
                <li>future timestamps;</li>
                <li>previously processed intervals;</li>
                <li>source evidence hash duplication.</li>
            </ul>
        </section>

        <section class="wp-section" id="audit">
            <div class="wp-num">08 // Audit Chain</div>
            <h2>History is extended, not silently rewritten.</h2>

            <p>
                Accepted verification events are linked into an append-only cryptographic audit history. Each event can reference the state that came before it.
            </p>

            <div class="wp-flow">VSE_GENESIS
    ↓
AUDIT_HASH_0001
    ↓
AUDIT_HASH_0002
    ↓
AUDIT_HASH_0003
    ↓
...</div>

            <div class="wp-rule"><span>NEW INFORMATION CREATES NEW STATE.</span><br>IT DOES NOT REWRITE OLD STATE.</div>

            <p>
                Corrections, investigations, exclusions or security actions should therefore create new auditable events instead of mutating accepted history.
            </p>
        </section>

        <section class="wp-section" id="unit">
            <div class="wp-num">09 // VSE Unit</div>
            <h2>A verification instrument, not a speculative token.</h2>

            <p>
                A VSE Unit represents verified renewable-energy state. It is not designed as a freely tradable cryptocurrency.
            </p>

            <ul class="wp-list">
                <li>minting restricted to authorized VSE infrastructure;</li>
                <li>VSE-controlled registry ownership;</li>
                <li>no unrestricted public transfer;</li>
                <li>no open secondary market;</li>
                <li>no arbitrary approval mechanism;</li>
                <li>source / audit / interval duplicate prevention;</li>
                <li>one-time retirement;</li>
                <li>no reactivation after final retirement.</li>
            </ul>

            <div class="wp-callout">
                <strong>Blockchain Role</strong>
                Blockchain finality supports verification and retirement state. Blockchain is not the original source of the renewable-energy measurement.
            </div>
        </section>

        <section class="wp-section" id="retirement">
            <div class="wp-num">10 // Retirement</div>
            <h2>Use is final.</h2>

            <p>
                Retirement represents final use or allocation of a verified VSE Unit. Once retired, the unit must not become active inventory again.
            </p>

            <p>
                <span class="wp-status ok">FINAL</span>
                no resale, no second retirement, no reactivation, no silent reassignment.
            </p>

            <p>
                Retirement may cryptographically bind a unit to a beneficiary, purpose, sale or allocation, methodology, protocol version and blockchain transaction.
            </p>
        </section>

        <section class="wp-section" id="proof">
            <div class="wp-num">11 // Final Proof</div>
            <h2>The result is designed for machines, not just humans.</h2>

            <p>A final proof may expose or reference:</p>

            <div class="wp-grid">
                <article class="wp-card"><h4>Unit Identity</h4><p>Public VSE Unit identifier and state.</p></article>
                <article class="wp-card"><h4>Energy</h4><p>Verified energy quantity and production interval.</p></article>
                <article class="wp-card"><h4>Source Integrity</h4><p>Raw evidence fingerprint and source references.</p></article>
                <article class="wp-card"><h4>Audit Integrity</h4><p>Previous audit hash and current audit hash.</p></article>
                <article class="wp-card"><h4>Finality</h4><p>Mint and retirement transaction references.</p></article>
                <article class="wp-card"><h4>Commercial Binding</h4><p>Beneficiary, purpose and sale hashes.</p></article>
                <article class="wp-card"><h4>Methodology</h4><p>Methodology hash and protocol version.</p></article>
                <article class="wp-card"><h4>Proof Signature</h4><p>Cryptographic signature of the proof envelope.</p></article>
            </div>
        </section>

        <section class="wp-section" id="antifraud">
            <div class="wp-num">12 // Anti-Fraud Whitelist Protocol</div>
            <h2>No commercial relationship can override failed validation.</h2>

            <div class="wp-big-quote">I AM <span>THE MATH.</span></div>

            <p>The Anti-Fraud model is based on strict technical principles:</p>
            <ul class="wp-list">
                <li>authoritative machine source;</li>
                <li>source identity matching;</li>
                <li>raw evidence first;</li>
                <li>cryptographic integrity;</li>
                <li>deterministic calculation;</li>
                <li>time integrity;</li>
                <li>zero double counting;</li>
                <li>no human override of failed evidence;</li>
                <li>immutable audit history;</li>
                <li>no retroactive manipulation;</li>
                <li>automated source exclusion;</li>
                <li>administrators cannot create energy;</li>
                <li>commercial relationships do not alter validity;</li>
                <li>retirement is final;</li>
                <li>proof must be machine-verifiable;</li>
                <li>no fabricated live state.</li>
            </ul>

            <p>
                <span class="wp-status reject">REJECTED</span>
                evidence that fails the protocol. No internal administrator, external reviewer, buyer, producer or commercial partner can turn a mathematically failed VSE proof into a valid one.
            </p>
        </section>

        <section class="wp-section" id="producer">
            <div class="wp-num">13 // Producer Model</div>
            <h2>Simple for the producer. Strict behind the scenes.</h2>

            <p>A producer should not need blockchain expertise. The intended onboarding flow is:</p>

            <div class="wp-flow">REGISTER
    ↓
ACCEPT TERMS
    ↓
SELECT MANUFACTURER
    ↓
SHARE OFFICIAL ACCESS
    ↓
PENDING_SHARE
    ↓
CHECKING
    ↓
ONLINE
    ↓
AUTOMATED DATA COLLECTION</div>

            <p>
                Producers do not need MetaMask, a crypto wallet, smart-contract interaction or manual production reporting. Their commercial compensation layer is separate from ownership of VSE Units.
            </p>
        </section>

        <section class="wp-section" id="buyer">
            <div class="wp-num">14 // Buyer Model</div>
            <h2>Enterprise buyers consume verified evidence, not infrastructure complexity.</h2>

            <p>
                A buyer can operate through an organization, internal buyer identity, contract and API layer. The intended experience is simple: request a verified renewable-energy volume, allocate it, retire it, then retrieve the final proof.
            </p>

            <div class="wp-flow">BUYER REQUEST
    ↓
ELIGIBLE VERIFIED INVENTORY
    ↓
ALLOCATION
    ↓
RETIREMENT
    ↓
SIGNED PROOF
    ↓
API / PUBLIC VERIFICATION</div>
        </section>

        <section class="wp-section" id="enterprise">
            <div class="wp-num">15 // Enterprise Layer</div>
            <h2>Verification infrastructure needs enterprise controls.</h2>

            <div class="wp-grid">
                <article class="wp-card"><h4>Organizations & Roles</h4><p>Multi-user enterprise access and permissions.</p></article>
                <article class="wp-card"><h4>Contracts</h4><p>Versioned commercial agreements and terms.</p></article>
                <article class="wp-card"><h4>Usage Metering</h4><p>Verified, minted and retired energy accounting.</p></article>
                <article class="wp-card"><h4>Billing</h4><p>Invoices, invoice items and payment records.</p></article>
                <article class="wp-card"><h4>SLA</h4><p>Service-level policies and incident tracking.</p></article>
                <article class="wp-card"><h4>API Access</h4><p>Scoped API keys and rate limiting.</p></article>
                <article class="wp-card"><h4>Webhooks</h4><p>Signed HTTPS delivery with retry and failure state.</p></article>
                <article class="wp-card"><h4>Reviews</h4><p>Operational review without rewriting raw evidence.</p></article>
            </div>
        </section>

        <section class="wp-section" id="security">
            <div class="wp-num">16 // Security Architecture</div>
            <h2>Least privilege and separated authority.</h2>

            <p>The intended security model separates web operations from blockchain signing authority.</p>

            <ul class="wp-list">
                <li>dedicated minter signer;</li>
                <li>dedicated retirer signer;</li>
                <li>Safe-controlled administrative ownership;</li>
                <li>HMAC-authenticated internal signer requests;</li>
                <li>timestamp skew validation;</li>
                <li>nonce / replay protection;</li>
                <li>private keys outside public web code;</li>
                <li>environment-based secret management;</li>
                <li>hashed API credentials;</li>
                <li>signed proof envelopes;</li>
                <li>append-only audit behavior.</li>
            </ul>

            <div class="wp-callout">
                <strong>Critical Rule</strong>
                Production database credentials, blockchain private keys, proof signing secrets, HMAC secrets and manufacturer API credentials must never be committed to a public repository.
            </div>
        </section>

        <section class="wp-section" id="regulatory">
            <div class="wp-num">17 // Regulatory Position</div>
            <h2>Technical verification is not the same thing as regulatory recognition.</h2>

            <p>
                VSE Protocol should not be represented solely by operation of the software as an official Guarantee of Origin, EECS certificate, government-issued renewable-energy certificate, electricity-trading authorization, or automatically accepted Scope 2 instrument.
            </p>

            <p>
                Buyer acceptance, regulatory treatment, reporting eligibility and assurance requirements depend on the applicable jurisdiction, contractual framework, reporting framework and external review requirements.
            </p>

            <p>
                <span class="wp-status info">POSITION</span>
                VSE is currently positioned as machine-verifiable renewable-energy evidence and data infrastructure.
            </p>
        </section>

        <section class="wp-section" id="economics">
            <div class="wp-num">18 // Commercial Model</div>
            <h2>The commercial layer is separate from evidence validity.</h2>

            <p>
                VSE can support enterprise plans, integration fees, recurring platform fees, usage-based pricing, contracts, SLA and custom commercial terms. None of these commercial relationships are allowed to weaken technical validation.
            </p>

            <div class="wp-table-wrap">
                <table class="wp-table">
                    <thead>
                        <tr>
                            <th>Commercial Element</th>
                            <th>Allowed to Affect</th>
                            <th>Must Not Affect</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Plan / Subscription</td>
                            <td>Features, support, access, limits.</td>
                            <td>Mathematical validity.</td>
                        </tr>
                        <tr>
                            <td>Contract</td>
                            <td>Pricing, volume, duration, SLA.</td>
                            <td>Source acceptance rules.</td>
                        </tr>
                        <tr>
                            <td>Buyer Size</td>
                            <td>Commercial negotiation.</td>
                            <td>Evidence validation.</td>
                        </tr>
                        <tr>
                            <td>Manual Review</td>
                            <td>Investigation and assurance.</td>
                            <td>Raw evidence or failed proof status.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="wp-section" id="roadmap">
            <div class="wp-num">19 // Roadmap</div>
            <h2>From test-ready protocol to production verification infrastructure.</h2>

            <div class="wp-grid">
                <article class="wp-card">
                    <h4>Phase 1 // Test-Ready Core</h4>
                    <p>Enterprise web, schema, producer/buyer/admin flows, evidence model, audit architecture, signer and proof framework.</p>
                </article>
                <article class="wp-card">
                    <h4>Phase 2 // Live Manufacturer Integration</h4>
                    <p>Activated manufacturer API, real plant discovery, real telemetry, interval processing and rejection behavior.</p>
                </article>
                <article class="wp-card">
                    <h4>Phase 3 // On-Chain Validation</h4>
                    <p>Contract compilation, testnet deployment, real mint, retirement and finality verification.</p>
                </article>
                <article class="wp-card">
                    <h4>Phase 4 // Security & Operations</h4>
                    <p>Independent implementation and security review, contract review, backup/restore, incident response and infrastructure hardening. External review may assess the implementation, but it does not determine or override the mathematical validity of individual VSE proofs.</p>
                </article>
                <article class="wp-card">
                    <h4>Phase 5 // Enterprise Pilot</h4>
                    <p>Real producers, real buyer allocation, API integration, contractual and assurance testing.</p>
                </article>
                <article class="wp-card">
                    <h4>Phase 6 // Scale</h4>
                    <p>Additional manufacturers, more geographies, larger producer network and institutional adoption.</p>
                </article>
            </div>
        </section>

        <section class="wp-section" id="conclusion">
            <div class="wp-num">20 // Conclusion</div>
            <h2>The product is the proof chain.</h2>

            <p>
                VSE Protocol is not merely a website, a database, an API, or a smart contract. Its value comes from combining physical renewable-energy telemetry, source integrity, deterministic calculation, cryptographic auditability, duplicate prevention, retirement finality and enterprise delivery into one verification infrastructure.
            </p>

            <div class="wp-big-quote"><span>VERIFY.</span> PROVE. <span>RETIRE.</span></div>

            <div class="wp-rule">WHO VERIFIED THE VERIFIER?<br><span>VERIFY THE PROOF.</span></div>

            <div class="wp-callout">
                <strong>Final Principle</strong>
                Physical energy creates machine data. VSE preserves the evidence, validates the mathematics, records the state and produces a proof that can be checked independently.
            </div>

            <p>
                This whitepaper describes the intended architecture and operating principles of the current VSE Protocol development line. Production claims must remain limited to functions that have been validated in the actual deployed environment.
            </p>
        </section>

    </main>
</div>

<footer class="wp-footer">
    <div class="wp-shell wp-footer-inner">
        <div>
            <strong>VSE PROTOCOL</strong><br>
            I AM THE MATH. // VERIFY. PROVE. RETIRE.
        </div>
        <div>
            Whitepaper <?= vse_h($whitepaperVersion) ?> · Release <?= vse_h($release) ?><br>
            Copyright © 2026 Tamás Varga ("NERGAL") / VSE Protocol · Proprietary · All Rights Reserved
        </div>
    </div>
</footer>

</body>
</html>
