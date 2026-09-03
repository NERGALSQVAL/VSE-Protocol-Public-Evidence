<div align="center">

# VSE PROTOCOL

### MACHINE-VERIFIABLE RENEWABLE-ENERGY EVIDENCE INFRASTRUCTURE

> **I AM THE MATH.**

**VERIFY. PROVE. RETIRE.**

![Release](https://img.shields.io/badge/Release-v1.1.0--beta.1_PROTOCOL-16a34a?style=for-the-badge)
![Status](https://img.shields.io/badge/Status-Test--Ready-2563eb?style=for-the-badge)
![Production](https://img.shields.io/badge/Production-Not_Certified-b91c1c?style=for-the-badge)
![License](https://img.shields.io/badge/License-Proprietary-444?style=for-the-badge)

**Current development release:** `v1.1.0-beta.1_PROTOCOL`  
**Baseline:** `v1.0.0-beta.1_BASELINE`

</div>

---

## Start Here

| Document | What it contains |
|---|---|
| **[WHITEPAPER.md](WHITEPAPER.md)** | Full technical architecture, proof model, enterprise layer, security and roadmap |
| **[PROTOCOL.md](PROTOCOL.md)** | Anti-Fraud Whitelist and deterministic network rules |
| **[ATTESTATION.md](ATTESTATION.md)** | Formal protocol-integrity and verification attestation |
| **[ABOUT.md](ABOUT.md)** | Plain-language project identity, purpose and positioning |
| **[LICENSE](LICENSE)** | Proprietary licensing and rights |

---

## What VSE Does

VSE Protocol is designed to transform authenticated renewable-energy production telemetry into deterministic, auditable, single-use digital energy proofs.

It is **not** designed as a general-purpose cryptocurrency project. Blockchain is used as part of the registry and finality architecture, not as the source of the energy measurement.

```text
PHYSICAL ENERGY ASSET
        ↓
MANUFACTURER-AUTHORITATIVE DATA
        ↓
RAW EVIDENCE
        ↓
CRYPTOGRAPHIC FINGERPRINT
        ↓
DETERMINISTIC VALIDATION
        ↓
ENERGY CALCULATION
        ↓
APPEND-ONLY AUDIT CHAIN
        ↓
VSE UNIT
        ↓
MINT
        ↓
ALLOCATION
        ↓
RETIREMENT
        ↓
MACHINE-VERIFIABLE PROOF
```

<div align="center">

## NO EVIDENCE = NO VERIFIED UNIT = NO VALID PROOF

</div>

---

## Core Verification Rules

| Rule | Meaning |
|---|---|
| **Authoritative machine source** | Production evidence must originate through an approved machine-authoritative path. |
| **Raw evidence first** | Source evidence is captured before verified state is created. |
| **Independent hashing** | VSE calculates its own cryptographic fingerprint of received evidence. |
| **Deterministic validation** | The same valid evidence under the same methodology and version should produce the same result. |
| **No human override** | Failed mathematical validation cannot be manually converted into valid energy. |
| **Append-only audit** | New information creates new state instead of silently rewriting accepted history. |
| **Zero double use** | The same production interval must not become new verified inventory twice. |
| **Final retirement** | A retired VSE Unit must not return to active inventory. |
| **Machine-verifiable proof** | Final proof state is designed to be independently checked by software. |

---

## Authoritative Source Model

```text
INVERTER / SMART METER
        ↓
OFFICIAL MANUFACTURER INFRASTRUCTURE
        ↓
AUTHENTICATED API / OPENAPI
        ↓
VSE ORACLE
```

Manual production totals, screenshots, spreadsheets, user-generated CSV claims, edited payloads and unverifiable third-party totals are not treated as primary authoritative evidence.

The current primary manufacturer integration direction is **SOLARMAN paid OpenAPI**.

---

## VSE Unit & Retirement

A **VSE Unit** is a verification instrument, not a freely tradable speculative token.

The intended registry model includes:

- authorized VSE minting only;
- VSE-controlled registry ownership;
- no unrestricted public transfer;
- no open secondary market;
- duplicate source / interval / audit protection;
- one-time retirement;
- no reactivation after final retirement.

> **RETIREMENT IS FINAL.**

---

## Anti-Fraud Position

<div align="center">

### ONE PROTOCOL. SAME MATHEMATICS FOR EVERYONE.

</div>

```text
IF VALIDATION PASSES
    → CONTINUE

IF VALIDATION FAILS
    → REJECT
```

No administrator, buyer, producer, reviewer, partner or commercial relationship may convert mathematically failed evidence into valid VSE energy.

> **ADMINISTRATIVE PRIVILEGE ENDS WHERE MATHEMATICAL VERIFICATION BEGINS.**

---

## Audit Principle

> ## NEW INFORMATION CREATES NEW STATE.
> ## IT DOES NOT REWRITE OLD STATE.

Corrections, investigations, exclusions and security actions create new auditable state instead of silently rewriting accepted historical evidence.

---

## Development Status

| Field | Value |
|---|---|
| Current release | `v1.1.0-beta.1_PROTOCOL` |
| Baseline | `v1.0.0-beta.1_BASELINE` |
| Development state | **Test-ready** |
| Production certification | **Not production-certified** |
| Evidence model | Machine-verifiable renewable-energy evidence |

The baseline release remains immutable. New development proceeds through separately versioned releases.

External technical, security or legal review may assess the implementation and operating environment. It does **not** determine or override the mathematical validity of an individual VSE proof.

---

## Regulatory Position

VSE does not claim, solely by operation of this software, to be an official Guarantee of Origin (`GO`), EECS certificate, government-issued renewable-energy certificate, electricity-trading authorization, or automatically accepted Scope 2 instrument.

VSE is currently positioned as **machine-verifiable renewable-energy evidence and data infrastructure**.

Buyer acceptance and regulatory treatment depend on the applicable legal, contractual, accounting, reporting and assurance framework.

---

## Repository Layout

```text
VSE-Protocol-Public-Evidence/
├── README.md
├── ABOUT.md
├── WHITEPAPER.md
├── PROTOCOL.md
├── ATTESTATION.md
└── LICENSE
```

No application source code, credentials, private keys or production secrets belong in this public evidence repository.

---

## License

This repository is **proprietary and not open source** unless a specific component explicitly states otherwise.

Public visibility does not grant permission to copy, modify, redistribute, commercialize or reuse protected VSE Materials.

See **[LICENSE](LICENSE)**.

---

<div align="center">

## CODE DOESN'T HAVE POCKETS.

### WHO VERIFIED THE VERIFIER?

# VERIFY THE PROOF.

**VSE PROTOCOL // VERIFY. PROVE. RETIRE.**

Copyright © 2026 Tamás Varga ("NERGAL") / VSE Protocol  
**All Rights Reserved**

</div>
