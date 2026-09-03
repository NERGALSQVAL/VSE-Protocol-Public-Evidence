# VSE Protocol

> **Machine-verifiable renewable-energy evidence infrastructure.**

**Current development release:** `v1.1.0-beta.1_PROTOCOL`
**Baseline release:** `v1.0.0-beta.1_BASELINE`
**Status:** Test-ready development release. Not production-certified.

---

## Overview

VSE Protocol is an automated verification infrastructure designed to transform authenticated renewable-energy production data into immutable, single-use, machine-verifiable digital energy proofs for enterprise buyers.
VSE is not designed as a general-purpose cryptocurrency project.
The blockchain layer is only one part of a larger verification chain.
The core product is:

```
AUTHENTICATED ENERGY DATA
        ↓
RAW EVIDENCE
        ↓
CRYPTOGRAPHIC INTEGRITY
        ↓
DETERMINISTIC VALIDATION
        ↓
AUDIT CHAIN
        ↓
VSE UNIT
        ↓
MINT
        ↓
ALLOCATION / SALE
        ↓
RETIREMENT
        ↓
MACHINE-VERIFIABLE PROOF
```

This public repository documents the VSE Protocol architecture, verification principles, development status, attestation model, and licensing terms. Public visibility does not make the VSE Materials open source and does not grant permission to reuse protected VSE implementations or documentation.

---

# Why VSE Exists

A company may claim that renewable energy was used.
VSE is designed to answer the harder questions:

- Which physical source produced the energy?
- When was it produced?
- Where did the source data come from?
- Was the original evidence preserved?
- Was the evidence modified?
- Was the same production interval already used?
- Was the verified energy already retired?
- Can the final claim be independently verified by software?

The objective is to make renewable-energy evidence traceable from machine source to final retirement.

---

# Core Principle

## I AM THE MATH.

VSE is built around deterministic validation.
A commercial relationship, administrator, buyer, producer, or human reviewer must not be able to convert mathematically invalid machine evidence into valid production.

```
IF VALIDATION PASSES
    → CONTINUE

IF VALIDATION FAILS
    → REJECT
```

No manual override should be able to create verified energy unsupported by evidence.
See:

- [`ATTESTATION.md`](ATTESTATION.md)
- [`LICENSE`](LICENSE)

---

# Verification Flow

The intended production flow is:

```
PHYSICAL ENERGY ASSET
        ↓
MANUFACTURER-AUTHORITATIVE INFRASTRUCTURE
        ↓
VSE ORACLE
        ↓
RAW RESPONSE CAPTURE
        ↓
RAW EVIDENCE HASH
        ↓
SOURCE / TIME / INTERVAL VALIDATION
        ↓
ENERGY CALCULATION
        ↓
AUDIT HASH CHAIN
        ↓
VSE UNIT
        ↓
MINT
        ↓
BUYER ALLOCATION
        ↓
RETIREMENT
        ↓
FINAL PROOF
```

---

# Authoritative Energy Sources

VSE is designed to accept renewable-energy data only through approved machine-authoritative sources associated with identifiable physical assets.
Examples include:

- solar inverters;
- smart meters;
- approved hardware telemetry;
- official manufacturer infrastructure;
- authenticated manufacturer cloud APIs;
- authenticated manufacturer OpenAPI integrations.

The current primary integration direction is SOLARMAN paid OpenAPI.
The protocol does not treat the following as authoritative primary production evidence:

- manual production entry;
- spreadsheets;
- screenshots;
- self-reported totals;
- user-uploaded CSV production claims;
- manually edited payloads;
- unverifiable third-party totals.

---

# Producer Flow

A renewable-energy producer:

1. Registers in VSE.
2. Accepts the applicable VSE agreement.
3. Selects the inverter / manufacturer.
4. Shares access through the manufacturer's official system.
5. Waits for VSE to detect access automatically.
6. The node transitions through states such as:

```
PENDING_SHARE
    ↓
CHECKING
    ↓
ONLINE
```

7. VSE begins collecting manufacturer-authoritative telemetry.
8. Verified production is processed automatically.

The producer does not need:

- a crypto wallet;
- MetaMask;
- blockchain knowledge;
- smart-contract interaction;
- manual production reporting.

---

# Buyer Flow

Enterprise buyers interact with VSE through an organization and buyer layer.
The platform supports concepts including:

- internal buyer IDs;
- organizations;
- contracts;
- subscriptions;
- service plans;
- API keys;
- usage metering;
- invoicing;
- SLA controls;
- webhook delivery;
- review levels;
- allocation and retirement;
- machine-readable proof retrieval.

A buyer can request verified renewable-energy volume and receive a final cryptographic proof after retirement.

---

# VSE Unit

A VSE Unit is intended as a verification instrument.
It is not designed as a freely tradable cryptocurrency.
The intended registry model includes:

- authorized VSE minting only;
- VSE-controlled ownership;
- no unrestricted public transfer;
- no open secondary market;
- no arbitrary approval mechanism;
- source duplicate prevention;
- interval duplicate prevention;
- audit duplicate prevention;
- one-time retirement;
- no reactivation after retirement.

The unit exists to preserve verification state and retirement finality.

---

# Retirement

Retirement represents final use.
After valid retirement, a VSE Unit must not:

- return to active inventory;
- be sold again;
- be retired twice;
- be reactivated;
- be silently reassigned.

A retirement may bind the unit to:

- beneficiary hash;
- purpose hash;
- sale hash;
- buyer identity reference;
- retirement transaction;
- methodology;
- protocol version.

---

# Audit Model

VSE uses an append-oriented cryptographic audit model.
The central rule is:

> **NEW INFORMATION CREATES NEW STATE. IT DOES NOT REWRITE OLD STATE.**

Accepted evidence should not be silently changed later.
Corrections, investigations, exclusions, or security actions should create new audit events instead of modifying historical evidence.

---

# Proof Model

A final VSE proof may include:

- public VSE Unit ID;
- verified energy quantity;
- production interval;
- source evidence hash;
- previous audit hash;
- current audit hash;
- methodology hash;
- mint transaction;
- retirement transaction;
- beneficiary hash;
- purpose hash;
- sale hash;
- smart-contract address;
- chain identifier;
- protocol version;
- Ed25519 proof signature.

The public proof page is a representation of the verification state.
The cryptographic state is the evidence.

---

# Anti-Fraud Rules

The VSE Anti-Fraud Whitelist Protocol is based on the following principles:

- authoritative machine source;
- raw evidence first;
- deterministic validation;
- cryptographic integrity;
- source identity matching;
- time integrity;
- duplicate prevention;
- no human override of failed evidence;
- immutable audit history;
- no retroactive manipulation;
- automated source exclusion;
- administrators cannot create energy;
- commercial relationships do not affect validity;
- retirement is final;
- proofs must be machine-verifiable;
- no fabricated live state.

The web implementation includes a dedicated **Protocol / Network Rules** section.

---

# Enterprise Layer

The enterprise platform includes support for:

- organizations;
- users and roles;
- producer profiles;
- buyer profiles;
- contracts;
- contract versions;
- subscriptions;
- service plans;
- usage meters;
- invoices;
- invoice items;
- payments;
- SLA policies;
- SLA incidents;
- manual review levels for compliance, investigation, support, and enterprise assurance outside mathematical proof validity;
- API clients;
- API keys;
- scope enforcement;
- rate limiting;
- signed HTTPS webhooks;
- webhook retry;
- audit logging;
- SSO-ready configuration.

---

# Service Plans

The current commercial layer supports a five-tier structure:

- Starter
- Professional
- Business
- Enterprise
- Enterprise+

Contract terms may include:

- 1 year
- 2 years
- 5 years
- 10 years

Commercial agreements may define pricing, volume, SLA, support, reporting, access, and billing.
They must not alter the mathematical validity of energy evidence.

---

# Current Web Application

The current VSE web interface includes:

- Home
- Solution
- Platform
- Standard
- Protocol
- Plans
- About
- Contact
- Sign In
- Registration
- Public Audit Proof
- Producer Operations
- Buyer & Retirement
- Admin Command Center
- Enterprise Controls

The interface uses a black / neon-green enterprise visual system.

---

# Repository Structure

A typical installation contains components such as:

```
/
├── VERSION
├── CHANGELOG.md
├── README.md
├── ATTESTATION.md
├── LICENSE
├── backend/
│   ├── bootstrap/
│   ├── cli/
│   ├── database/
│   ├── services/
│   └── ...
├── signer/
│   └── ...
└── web/
    └── public/
        ├── index.php
        ├── protocol.php
        ├── audit.php
        ├── login.php
        ├── register.php
        ├── admin/
        ├── producer/
        ├── buyer/
        ├── enterprise/
        └── assets/
```

Exact paths may vary between releases.

---

# Configuration

VSE uses environment-based configuration.
Typical configuration groups include:

```
DATABASE
SOLARMAN
BLOCKCHAIN / RPC
SAFE
MINTER
RETIRER
SIGNER SERVICE
INTERNAL API
PROOF SIGNING
EVIDENCE STORAGE
CONTRACT STORAGE
INVOICE STORAGE
WEB BASE URL
```

Sensitive values must never be committed to a public repository.
Do not commit:

- production database passwords;
- private keys;
- signer keys;
- API secrets;
- proof secret keys;
- HMAC secrets;
- administrative setup tokens.

Use a private `.env` file and maintain a sanitized `.env.example`.

---

# Database

The VSE database layer is designed to support areas including:

- users;
- organizations;
- organization membership;
- producers;
- buyers;
- IoT nodes;
- manufacturer connections;
- raw manufacturer evidence;
- production intervals;
- VSE Units;
- audit events;
- blockchain jobs;
- retirements;
- sales / allocations;
- contracts;
- subscriptions;
- usage metering;
- billing;
- SLA;
- reviews;
- API access;
- webhook delivery;
- security / action logs.

The canonical schema for a release should be imported from the versioned database migration included with that release.

---

# SOLARMAN Integration

The production integration direction is the official SOLARMAN OpenAPI.
Real operation requires valid manufacturer credentials and activated API access.
When SOLARMAN is not configured, the system must remain visibly:

```
NOT CONFIGURED
```

It must not fabricate live production.

---

# Blockchain Layer

The intended smart-contract architecture uses a non-upgradeable VSE Unit Registry.
The registry is designed around:

- Safe-controlled administration;
- restricted minter role;
- restricted retirer role;
- no normal public transfers;
- no normal approval flow;
- duplicate prevention;
- one-time retirement;
- immutable retirement state.

Actual deployment requires:

- configured RPC;
- deployed contract;
- Safe address;
- minter address;
- retirer address;
- dedicated private keys;
- sufficient gas;
- network testing.

---

# Signer Service

Mint and retirement operations are intended to use a dedicated signer service instead of exposing blockchain private keys to the web backend.
Security controls include concepts such as:

- HMAC-authenticated requests;
- nonce protection;
- timestamp skew limits;
- restricted endpoints;
- separated minter and retirer keys;
- confirmation tracking.

---

# Security Principles

VSE follows these principles:

1. **Evidence before proof**
2. **No fabricated state**
3. **No manual energy creation**
4. **Least privilege**
5. **Separated signing authority**
6. **Immutable audit history**
7. **Duplicate prevention**
8. **Final retirement**
9. **Secrets outside the repository**
10. **Machine-verifiable outputs**

---

# Development Status

Current release:

```
v1.1.0-beta.1_PROTOCOL
```

Baseline:

```
v1.0.0-beta.1_BASELINE
```

The baseline release must remain immutable.
Versioning rules:

```
PATCH  = backward-compatible bug fix
MINOR  = backward-compatible new functionality
MAJOR  = breaking architecture / API / schema / contract change
```

Example development progression:

```
1.1.0-beta.1
1.1.0-beta.2
1.1.0-rc.1
1.1.0
```

Every release should update:

- `VERSION`
- `CHANGELOG.md`
- release notes
- validation report

---

# Production Readiness

The current release must not be represented as production-certified until the deployed system has passed all required real-world validation.
Production validation includes, where applicable:

- live manufacturer API testing;
- real inverter telemetry;
- production database testing;
- secret-management review;
- smart-contract compilation;
- testnet deployment;
- real mint testing;
- real retirement testing;
- proof-verification testing;
- backup and restore;
- rate-limit validation;
- webhook delivery testing;
- access-control testing;
- infrastructure hardening;
- independent security review;
- smart-contract review;
- applicable legal and regulatory review.

External reviews may assess implementation quality, security, deployment controls, or the applicable legal environment. They do not determine or override the mathematical validity of an individual VSE proof. A failed VSE validation cannot be converted into a valid proof by external or internal human approval.

---

# Regulatory Position

VSE Protocol does not claim, solely by operation of this software, to be:

- an official Guarantee of Origin (GO);
- an EECS certificate;
- a government-issued renewable-energy certificate;
- an electricity-trading authorization;
- automatically accepted for Scope 2 reporting;
- automatically recognized under every corporate or regulatory framework.

Buyer acceptance and regulatory treatment depend on the applicable legal, contractual, accounting, reporting, and assurance framework.
VSE is currently positioned as a machine-verifiable renewable-energy evidence and data infrastructure.

---

# License

VSE Protocol is proprietary software.
This repository is **not open source** unless a specific component explicitly states otherwise.
See:
[`LICENSE`](LICENSE)
All VSE-owned software, documentation, protocol logic, methodology, design, branding, verification architecture, and related materials are protected.
Third-party components remain governed by their respective licenses.

---

# Attestation

The technical attestation model is documented in:
[`ATTESTATION.md`](ATTESTATION.md)

---

# Project Identity

## VSE PROTOCOL

> **I AM THE MATH.**

**VERIFY. PROVE. RETIRE.**

---

Copyright © 2026 Tamás Varga ("NERGAL") / VSE Protocol
All rights reserved.
