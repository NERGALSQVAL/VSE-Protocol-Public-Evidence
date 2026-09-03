# Security Architecture

## Principle

VSE separates ordinary web operations from sensitive signing authority and keeps secrets outside public application code.

## Controls

- dedicated minter signer;
- dedicated retirer signer;
- Safe-controlled administrative ownership;
- HMAC-authenticated internal signer requests;
- nonce / replay protection;
- timestamp skew validation;
- environment-based secret management;
- private keys outside public web code;
- hashed API credentials;
- signed proof envelopes;
- append-only audit behavior;
- least-privilege access control.

## Public Repository Rule

The following must never be committed publicly:

- production database credentials;
- blockchain private keys;
- signer keys;
- manufacturer API secrets;
- proof signing secrets;
- HMAC secrets;
- administrative setup tokens.

> **PUBLIC EVIDENCE IS NOT PUBLIC AUTHORITY.**

The repository may expose architecture, protocol rules, attestations, and proof models without exposing operational secrets.

[← Wiki Home](Home.md)