<div align="center">

# VSE PROTOCOL

### MACHINE-VERIFIABLE RENEWABLE-ENERGY EVIDENCE INFRASTRUCTURE

> **I AM THE MATH.**

**VERIFY. PROVE. RETIRE.**

`v1.1.0-beta.1_PROTOCOL` · `TEST-READY` · `NOT PRODUCTION-CERTIFIED`

</div>

---

## What VSE Does

VSE Protocol is designed to transform authenticated renewable-energy production telemetry into deterministic, auditable, single-use digital energy proofs for enterprise buyers.

VSE is **not** designed as a general-purpose cryptocurrency project. Blockchain is one component of a larger evidence and finality system.

```text
PHYSICAL ENERGY ASSET
        ↓
MANUFACTURER-AUTHORITATIVE DATA
        ↓
RAW EVIDENCE
        ↓
CRYPTOGRAPHIC INTEGRITY
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
MACHINE-VERIFIABLE PROOF
```

> **NO EVIDENCE = NO VERIFIED UNIT = NO VALID PROOF**

---

## Documentation

| Document | Purpose |
|---|---|
| **[ABOUT](ABOUT.md)** | What VSE is, why it exists, and how it is positioned |
| **[WHITEPAPER](WHITEPAPER.md)** | Full architecture, proof model, commercial layer, security and roadmap |
| **[PROTOCOL](PROTOCOL.md)** | Anti-Fraud Whitelist and network validation rules |
| **[ATTESTATION](ATTESTATION.md)** | Formal protocol integrity and verification attestation |
| **[WIKI](wiki/Home.md)** | Structured technical knowledge base |
| **[LICENSE](LICENSE)** | Proprietary licensing terms |

---

## Core Principles

| Principle | Meaning |
|---|---|
| **Authoritative machine source** | Production evidence must come through an approved machine-authoritative path. |
| **Raw evidence first** | Source evidence exists before verified state. |
| **Independent cryptographic integrity** | VSE calculates its own evidence fingerprints. |
| **Deterministic validation** | The same valid evidence under the same methodology should produce the same result. |
| **No human override** | Failed mathematical validation cannot be manually converted into valid energy. |
| **Append-only audit** | New information creates new state instead of silently rewriting old state. |
| **Zero double use** | The same underlying production must not become new inventory twice. |
| **Final retirement** | A retired VSE Unit must not return to active inventory. |
| **Machine-verifiable proof** | The final proof is intended to be independently checkable by software. |

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

VSE does not treat manually entered totals, screenshots, spreadsheets, user-generated CSV claims, edited payloads, or unverifiable third-party totals as primary authoritative production evidence.

The current primary manufacturer integration direction is **SOLARMAN paid OpenAPI**.

---

## Anti-Fraud Position

<div align="center">

### ONE PROTOCOL. SAME MATHEMATICS FOR EVERYONE.

</div>

A commercial relationship, administrator, buyer, producer, partner, or reviewer must not be able to convert mathematically invalid machine evidence into valid production.

```text
IF VALIDATION PASSES
    → CONTINUE

IF VALIDATION FAILS
    → REJECT
```

> **ADMINISTRATIVE PRIVILEGE ENDS WHERE MATHEMATICAL VERIFICATION BEGINS.**

---

## VSE Unit

A VSE Unit is a **verification instrument**, not a freely tradable speculative token.

The intended registry model includes authorized VSE minting, VSE-controlled ownership, no unrestricted public transfer, no open secondary market, duplicate prevention, one-time retirement, and no reactivation after final retirement.

Blockchain supports registry state and finality. It is **not** the source of the renewable-energy measurement.

---

## Producer Experience

```text
REGISTER
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
AUTOMATED COLLECTION
```

Producers do not need MetaMask, blockchain knowledge, manual smart-contract interaction, or manual production reporting.

---

## Buyer Experience

```text
BUYER REQUEST
    ↓
ELIGIBLE VERIFIED INVENTORY
    ↓
ALLOCATION
    ↓
RETIREMENT
    ↓
SIGNED PROOF
    ↓
API / PUBLIC VERIFICATION
```

The enterprise layer is designed around organizations, contracts, subscriptions, API access, usage metering, billing, SLA controls, webhooks, allocation, retirement, and proof retrieval.

Commercial terms must not alter mathematical validity.

---

## Audit Rule

> ## NEW INFORMATION CREATES NEW STATE.  
> ## IT DOES NOT REWRITE OLD STATE.

Corrections, investigations, exclusions, and security actions should create new auditable events instead of silently modifying accepted historical evidence.

---

## Development Status

| Field | Value |
|---|---|
| Current development release | `v1.1.0-beta.1_PROTOCOL` |
| Baseline release | `v1.0.0-beta.1_BASELINE` |
| Status | Test-ready development release |
| Production certification | **Not production-certified** |

The baseline release remains immutable. New development proceeds through separately versioned releases.

Production readiness requires validation of the actual deployed environment, including manufacturer API connectivity, live source telemetry, production database and secret management, signer deployment, smart-contract deployment, mint and retirement testing, proof verification, recovery, access controls, infrastructure hardening, and applicable security/legal review.

External review may assess implementation or operating environment. It does **not** override the mathematical validity of an individual VSE proof.

---

## Regulatory Position

VSE does not claim, solely by operation of this software, to be an official Guarantee of Origin (`GO`), EECS certificate, government-issued renewable-energy certificate, electricity-trading authorization, or automatically accepted Scope 2 instrument.

VSE is currently positioned as **machine-verifiable renewable-energy evidence and data infrastructure**.

Buyer acceptance and regulatory treatment depend on the applicable legal, contractual, accounting, reporting, and assurance framework.

---

## Repository License

This repository is **proprietary and not open source** unless a specific component explicitly states otherwise.

Public visibility does not grant permission to copy, modify, commercialize, redistribute, or reuse protected VSE Materials.

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
