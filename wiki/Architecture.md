# Architecture

> **VSE Protocol is an evidence system first and a blockchain system second.**

## End-to-End Architecture

```text
PHYSICAL ENERGY ASSET
        ↓
MANUFACTURER INFRASTRUCTURE
        ↓
VSE ORACLE
        ↓
RAW RESPONSE CAPTURE
        ↓
EVIDENCE HASH
        ↓
VALIDATION
        ↓
ENERGY CALCULATION
        ↓
AUDIT CHAIN
        ↓
VSE UNIT REGISTRY
        ↓
MINT
        ↓
BUYER ALLOCATION
        ↓
RETIREMENT
        ↓
SIGNED FINAL PROOF
```

## Layers

| Layer | Responsibility |
|---|---|
| Physical | Renewable-energy production |
| Manufacturer | Machine-authoritative telemetry delivery |
| Evidence | Raw payload preservation and hashing |
| Validation | Source, time, interval and duplicate checks |
| Calculation | Deterministic energy computation |
| Audit | Append-only linked state history |
| Registry | Unit identity, mint and retirement state |
| Enterprise | Buyers, producers, contracts, APIs, billing and SLA |
| Proof | Machine-readable final verification artifact |

## Core Boundary

Blockchain does not measure renewable energy. The physical device and manufacturer-authoritative telemetry provide the source evidence. Blockchain is used to preserve registry state and finality.

[← Wiki Home](Home.md)